<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Chapter
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $chapter;

    public function getUrlProps(): array
    {
        return ['chapter' => $this->chapter];
    }

    #[LiveAction]
    public function changeChapter(#[LiveArg] string $chapter): void
    {
        $this->chapter = $chapter;
    }
}
