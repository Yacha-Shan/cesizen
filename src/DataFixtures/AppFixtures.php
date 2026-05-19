<?php

namespace App\DataFixtures;

use App\Entity\Exercice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $exercices = [
            [
                'nom' => 'Cohérence cardiaque',
                'description' => 'Réduire le stress et réguler le système nerveux.',
                'detailCycle' => 'Chaque cycle correspond à une inspiration de 5 secondes suivie d’une expiration de 5 secondes. Pendant l’inspiration, l’air entre progressivement dans les poumons et le ventre se gonfle légèrement. Pendant l’expiration, l’air ressort lentement pour favoriser le relâchement du corps.',
                'cycles' => 6,
            ],
            [
                'nom' => 'Respiration 4-7-8',
                'description' => 'Favoriser l\'endormissement et calmer l\'anxiété.',
                'detailCycle' => 'Un cycle suit trois phases : 4 secondes d’inspiration, 7 secondes de rétention du souffle, puis 8 secondes d’expiration lente. La pause permet au corps de se stabiliser, et l’expiration prolongée aide à relâcher les tensions et à apaiser le rythme cardiaque.',
                'cycles' => 4,
            ],
            [
                'nom' => 'Respiration en boîte',
                'description' => 'Améliorer la concentration et la gestion du stress.',
                'detailCycle' => 'Chaque cycle est composé de 4 temps égaux : inspirer, retenir, expirer, retenir à nouveau. Cette régularité crée un rythme stable qui aide à calmer le mental, à recentrer l’attention et à retrouver une respiration plus contrôlée.',
                'cycles' => 4,
            ],
        ];

        foreach ($exercices as $data) {
            $exercice = new Exercice();
            $exercice
                ->setNom($data['nom'])
                ->setDescription($data['description'])
                ->setDetailCycle($data['detailCycle'])
                ->setCycles($data['cycles']);

            $manager->persist($exercice);
        }

        $manager->flush();
    }
}
