<?php

namespace App\Twig\Components;

use App\Name\Store;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Number
{
    use DefaultActionTrait;

    #[LiveProp(writable: true, url: true)]
    public int $number;

    public function __construct()
    {

    }

    #[LiveAction]
    public function changeNumber(#[LiveArg] int $number): void
    {
        $this->number = $number;
    }

    public function getResult(): int
    {
        return $this->number * 1000;
    }
}
