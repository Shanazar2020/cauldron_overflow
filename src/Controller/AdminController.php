<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index()
    {


        return $this->render('admin/dashboard.html.twig', [
            'chart' => 'chart1',
            'chart2' => 'chart2'
        ]);
    }

    /**
     * @Route("/admin/login/")
     */
    public function adminLogin()
    {
        return new Response('Pretend admin');
    }

}