<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/compte')]
final class GestionCompteController extends AbstractController
{
    #[Route('', name: 'app_gestion_compte')]
    public function index(UserRepository $userRepository): Response
    {
        $users = array_filter(
            $userRepository->findAll(),
            fn(User $u) => !in_array('ROLE_ADMIN', $u->getRoles())
        );

        $utilisateursActifs = array_filter(
            $users,
            fn(User $u) => $u->isActive()
        );

        $utilisateursDesactives = array_filter(
            $users,
            fn(User $u) => !$u->isActive()
        );

        $admins = array_filter(
            $userRepository->findAll(),
            fn(User $u) => in_array('ROLE_ADMIN', $u->getRoles())
        );

        $administrateursActifs = array_filter(
            $admins,
            fn(User $u) => $u->isActive()
        );

        $administrateursDesactives = array_filter(
            $admins,
            fn(User $u) => !$u->isActive()
        );

        return $this->render('gestion_compte/index.html.twig', [
            'utilisateursActifs' => array_values($utilisateursActifs),
            'utilisateursDesactives' => array_values($utilisateursDesactives),
            'administrateursActifs' => array_values($administrateursActifs),
            'administrateursDesactives' => array_values($administrateursDesactives),
        ]);
    }

    #[Route('/creer/{role}', name: 'app_gestion_compte_creer')]
    public function creer(
        string $role,
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        if (!in_array($role, ['user', 'admin'])) {
            throw $this->createNotFoundException();
        }

        if ($request->isMethod('POST')) {
            $user = new User();
            $user->setFirstname($request->request->get('firstname'));
            $user->setLastname($request->request->get('lastname'));
            $user->setUsername($request->request->get('username'));
            $user->setEmail($request->request->get('email'));
            $user->setRoles($role === 'admin' ? ['ROLE_ADMIN'] : ['ROLE_USER']);
            $user->setIsActive(true);
            $user->setPassword(
                $passwordHasher->hashPassword($user, 'CesiZen123')
            );

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Compte créé avec succès.');
            return $this->redirectToRoute('app_gestion_compte');
        }

        return $this->render('gestion_compte/creer.html.twig', [
            'role' => $role,
        ]);
    }

    #[Route('/desactiver/{id}', name: 'app_gestion_compte_desactiver')]
    public function desactiver(
        User $user,
        EntityManagerInterface $entityManager
    ): Response {
        $user->setIsActive(!$user->isActive());
        $entityManager->flush();

        $statut = $user->isActive() ? 'activé' : 'désactivé';
        $this->addFlash('success', "Compte {$statut} avec succès.");
        return $this->redirectToRoute('app_gestion_compte');
    }

    #[Route('/supprimer/{id}', name: 'app_gestion_compte_supprimer')]
    public function supprimer(
        User $user,
        EntityManagerInterface $entityManager
    ): Response {
        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('success', 'Compte supprimé avec succès.');
        return $this->redirectToRoute('app_gestion_compte');
    }
}
