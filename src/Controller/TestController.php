<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route(path: '/')]
    public function index(): Response
    {
        return new Response('<h1>А йа виннинг сан?</h1>');
    }
}