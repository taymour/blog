<?php
declare(strict_types=1);

namespace App\Twig\Components;

use App\Entity\Post;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class PostCard
{
    use DefaultActionTrait;

    #[LiveProp(writable: [LiveProp::IDENTITY, 'title', 'body'])]
    public Post $post;
}
