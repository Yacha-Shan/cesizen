<?php

namespace App\Controller;

use App\Form\ProfileFormType;
use App\Repository\ParametreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Form\ChangePasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/parametre')]
final class ParametreController extends AbstractController
{
    #[Route(name: 'app_parametre_index', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(ProfileFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $avatarFile = $form->get('avatarFile')->getData();

            if ($avatarFile) {
                if ($user->getAvatar()) {
                    $oldFile = $this->getParameter('avatars_directory') . '/' . $user->getAvatar();
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }

                $originalFilename = pathinfo($avatarFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $avatarFile->guessExtension();

                $avatarFile->move(
                    $this->getParameter('avatars_directory'),
                    $newFilename
                );

                $user->setAvatar($newFilename);
            }

            $entityManager->flush();

            $this->addFlash('success', 'Profil mis à jour avec succès !');

            return $this->redirectToRoute('app_parametre_index');
        }

        return $this->render('parametre/index.html.twig', [
            'profileForm' => $form,
            'user' => $user,
        ]);
    }

    #[Route('/edit-password', name: 'app_parametre_edit_password', methods: ['GET', 'POST'])]
    public function editPassword(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();

        $form = $this->createForm(ChangePasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $currentPassword = $form->get('currentPassword')->getData();
            $newPassword = $form->get('newPassword')->getData();

            if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
                $this->addFlash('error', 'L\'ancien mot de passe est incorrect.');
                return $this->redirectToRoute('app_parametre_edit_password');
            }

            $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
            $user->setPassword($hashedPassword);
            $entityManager->flush();

            $this->addFlash('success', 'Mot de passe modifié avec succès.');
            return $this->redirectToRoute('app_parametre_index');
        }

        return $this->render('parametre/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
