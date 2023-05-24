<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(): Response
    {
        return $this->render("question/homepage.html.twig");
    }

    /**
     * @Route("/show/{slug}", name="app_question_show")
     */
    public function show($slug): Response
    {
        // generate some fake text
        $answers = [
            'yep',
            'yep',
            'yep'
        ];

//        dump();
        return $this->render("question/show.html.twig",[
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers

        ]);
//        $slug = ucwords(str_replace('-', ' ', $slug));
//        return new Response("Again fuck you ".$slug);
    }
}