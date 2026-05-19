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
                'detailCycle' => 'Chaque cycle correspond à une inspiration de 5 secondes suivie d’une expiration de 5 secondes. Pendant l’inspiration, l’air entre progressivement dans les poumons et le ventre se gonfle légèrement. Pendant l’expiration, l’air ressort lentement pour favoriser le relâchement du corps.',
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
                'detailCycle' => 'Un cycle suit trois phases : 4 secondes d’inspiration, 7 secondes de rétention du souffle, puis 8 secondes d’expiration lente. La pause permet au corps de se stabiliser, et l’expiration prolongée aide à relâcher les tensions et à apaiser le rythme cardiaque.',
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
                'detailCycle' => 'Chaque cycle est composé de 4 temps égaux : inspirer, retenir, expirer, retenir à nouveau. Cette régularité crée un rythme stable qui aide à calmer le mental, à recentrer l’attention et à retrouver une respiration plus contrôlée.',
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
