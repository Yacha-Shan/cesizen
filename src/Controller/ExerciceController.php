<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExerciceController extends AbstractController
{
    #[Route('/exercice', name: 'app_exercice')]
    public function index(): Response
    {
        $exercices = [
            [
                'id' => 'coherence',
                'nom' => 'Cohérence cardiaque',
                'description' => 'Réduire le stress et réguler le système nerveux.',
                'etapes' => [
                    ['label' => 'Inspirez', 'duree' => 5],
                    ['label' => 'Expirez', 'duree' => 5],
                ],
                'cycles' => 6,
                'couleur' => '#3b82f6',
            ],
            [
                'id' => 'quatre-sept-huit',
                'nom' => 'Respiration 4-7-8',
                'description' => 'Favoriser l\'endormissement et calmer l\'anxiété.',
                'etapes' => [
                    ['label' => 'Inspirez', 'duree' => 4],
                    ['label' => 'Retenez', 'duree' => 7],
                    ['label' => 'Expirez', 'duree' => 8],
                ],
                'cycles' => 4,
                'couleur' => '#8b5cf6',
            ],
            [
                'id' => 'box',
                'nom' => 'Respiration en boîte',
                'description' => 'Améliorer la concentration et la gestion du stress.',
                'etapes' => [
                    ['label' => 'Inspirez', 'duree' => 4],
                    ['label' => 'Retenez', 'duree' => 4],
                    ['label' => 'Expirez', 'duree' => 4],
                    ['label' => 'Retenez', 'duree' => 4],
                ],
                'cycles' => 4,
                'couleur' => '#10b981',
            ],
        ];

        return $this->render('exercice/index.html.twig', [
            'exercices' => $exercices,
        ]);
    }
}
