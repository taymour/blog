<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Predis\Client as Redis;

class RedisController extends AbstractController
{
    #[Route('/redis', name: 'app_redis')]
    public function index(Redis $redis): Response
    {
        $key = 'toto';

        $redis->set('yoyo', json_encode(['mama mia', 'papa pia']));
        $redis->set('popo', json_encode($this->array()));
        $redis->get($key);
        $redis->get('yoyo');
        $redis->get('popo');
        $redis->get('popIEFOHOFIEOLo');
        $redis->incr('popo');

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


    private function array()
    {
        return [
            'user' => [
                'id' => 1,
                'name' => 'Alice',
                'email' => 'alice@example.com',
                'roles' => ['admin', 'editor'],
                'preferences' => [
                    'language' => 'fr',
                    'notifications' => [
                        'email' => true,
                        'sms' => false,
                    ],
                ],
            ],
            'posts' => [
                [
                    'id' => 101,
                    'title' => 'Premier Article',
                    'content' => 'Ceci est le contenu de l\'article.',
                    'tags' => ['php', 'symfony', 'développement'],
                    'created_at' => '2024-10-01 10:00:00',
                ],
                [
                    'id' => 102,
                    'title' => 'Deuxième Article',
                    'content' => 'Ceci est le contenu du deuxième article.',
                    'tags' => ['js', 'react', 'frontend'],
                    'created_at' => '2024-10-02 11:00:00',
                ],
            ],
            'settings' => (object) [
                'theme' => 'dark',
                'show_tutorials' => true,
                'max_posts_per_page' => 10,
            ],
            'statistics' => [
                'views' => 1500,
                'likes' => 320,
                'comments' => [
                    'total' => 50,
                    'recent' => [
                        [
                            'user' => 'Bob',
                            'comment' => 'Super article !',
                            'date' => '2024-10-03',
                        ],
                        [
                            'user' => 'Charlie',
                            'comment' => 'Merci pour ces informations.',
                            'date' => '2024-10-04',
                        ],
                    ],
                ],
            ],
        ];
    }
}
