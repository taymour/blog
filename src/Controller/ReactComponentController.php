<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReactComponentController extends AbstractController
{
    #[Route('/react/index', name: 'app_react_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig');
    }

    #[Route('/react/another', name: 'app_react_index_another')]
    public function another(): Response
    {
        return $this->render('index/another.html.twig');
    }
    
    #[Route('/react/noplayer', name: 'app_react_index_noplayer')]
    public function noplayer(): Response
    {
        return $this->render('index/noplayer.html.twig');
    }
}
