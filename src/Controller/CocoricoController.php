<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CocoricoController extends AbstractController
{
    #[Route('/cocorico', name: 'app_cocorico')]
    public function index(): Response
    {
        return $this->render('cocorico/index.html.twig', []);
    }

    #[Route('/clipboard', name: 'app_cocorico_copy_clipboard')]
    public function clipboard(): Response
    {
        return $this->render('cocorico/clipboard.html.twig', []);
    }

    #[Route('/slideshow', name: 'app_cocorico_slideshow')]
    public function slideshow(): Response
    {
        return $this->render('cocorico/slideshow.html.twig', []);
    }

    #[Route('/content', name: 'app_cocorico_content')]
    public function content(): Response
    {
        return $this->render('cocorico/content/index.html.twig', []);
    }

    #[Route('/content/messages', name: 'app_cocorico_content_messages')]
    public function contentMessages(): Response
    {
        return $this->render('cocorico/content/messages.html.twig', []);
    }

    #[Route('/content/comments', name: 'app_cocorico_content_comments')]
    public function contentComments(): Response
    {
        return $this->render('cocorico/content/comments.html.twig', []);
    }
}
