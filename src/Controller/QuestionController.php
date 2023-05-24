<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
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
        $slug = ucwords(str_replace('-', ' ', $slug));
        return new Response("Again fuck you ".$slug);
    }
}