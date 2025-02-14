<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LiveController extends AbstractController
{
    #[Route('/live/{chapter}/{letter}', name: 'app_live')]
    public function index(string $chapter, string $letter): Response
    {
        return $this->render('live/index.html.twig', [
            'letter' => $letter,
            'chapter' => $chapter,
        ]);
    }
}
