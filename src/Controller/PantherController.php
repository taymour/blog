<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PantherController extends AbstractController
{
    #[Route('/panther', name: 'app_panther')]
    #[Route('/panther.html', name: 'app_panther_html')]
    public function index(): Response
    {
        return $this->render('panther/index.html.twig');
    }
}
