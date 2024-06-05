<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use function Zenstruck\Foundry\faker;

class PostController extends AbstractController
{
    #[Route('/post/list', name: 'blog_post_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $postRepository = $entityManager->getRepository(Post::class);

        return $this->render('post//list.html.twig', [
            'posts' => $postRepository->findAll(),
        ]);
    }

    #[Route('/post/new/dummy', name: 'blog_post_new_dummy')]
    public function newDummy(EntityManagerInterface $entityManager): Response
    {
        $article = new Post();
        $article->setTitle(faker()->text(50));
        $article->setBody(faker()->text);
        $entityManager->persist($article);
        $entityManager->flush();

        return $this->redirectToRoute('blog_post_list');
    }

    #[Route('/post/new', name: 'blog_post_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('blog_post_list');
        }

        return $this->render('post/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/post/show/{id}', name: 'blog_post_show')]
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }

    #[Route('/post/edit/{id}', name: 'blog_post_edit')]
    public function edit(Request $request, Post $post, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($post);
            $entityManager->flush();

//            return $this->redirectToRoute('blog_post_list');
        }

        return $this->render('post/edit.html.twig', [
            'post' => $post,
            'form' => $form,
        ]);
    }

    #[Route('/post/delete/{id}', name: 'blog_post_delete')]
    public function delete(Post $post, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($post);
        $entityManager->flush();

        return $this->redirectToRoute('blog_post_list');
    }
}
