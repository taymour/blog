<?php

namespace App\Controller;

use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Predis\Client as Redis;

class RedisController extends AbstractController
{
    #[Route('/redis', name: 'app_redis')]
    public function index(Redis $redis, EntityManagerInterface $entityManager): Response
    {
        $entityManager->getRepository(Car::class)->findAll();

//        $redis->set('bobo', 'soso');

        $key = 'toto';

        $result = $redis->get($key);

        return $this->render('redis/index.html.twig', [
            'key' => $key,
            'result' => $result,
        ]);
    }

    #[Route('/redis/key/{key}/{value}', name: 'app_redis_write')]
    public function write(Redis $redis, string $key, string $value): Response
    {
        $redis->set($key, $value);

        return new Response('OK');
    }
}
