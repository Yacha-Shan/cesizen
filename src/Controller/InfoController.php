<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InfoController extends AbstractController
{
    #[Route('/', name: 'app_info')]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('info/index.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }
}
