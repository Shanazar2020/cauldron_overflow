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
        $tags = TagFactory::createMany(100);

        $questions = QuestionFactory::new()->createMany(20, function () use ($tags) {
            $random_tags = array();
            for ($i = 0; $i < rand(1, 5); $i++) {
                $random_tags[] = $tags[array_rand($tags)];
            }
            return ['tags' => $random_tags];
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
