<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\Tag;
use App\Factory\AnswerFactory;
use App\Factory\QuestionFactory;
use App\Factory\TagFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        TagFactory::createMany(100);

        $questions = QuestionFactory::new()->createMany(20, function () {
            return [
                'tags' => TagFactory::randomRange(2, 5)
            ];
        });

        QuestionFactory::new()->unpublished()->createMany(5);

        AnswerFactory::new()
            ->createMany(100, function () use ($questions) {
                return [
                    'question' => $questions[array_rand($questions)]
                ];
            });

        AnswerFactory::new()->needsApproval()->many(20)->create();


        $manager->flush();
    }
}
