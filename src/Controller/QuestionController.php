<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/homepage")
     */
    public function homepage(): Response
    {
        return new Response('Fuck you');
    }

    /**
     * @Route("/show/{slug}")
     */
    public function show($slug): Response
    {
        // generate some fake text
        $answers = [
            'yep',
            'yep',
            'yep'
        ];
        return $this->render("question/show.html.twig",[
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers

        ]);
//        $slug = ucwords(str_replace('-', ' ', $slug));
//        return new Response("Again fuck you ".$slug);
    }
}