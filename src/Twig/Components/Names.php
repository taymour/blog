<?php

namespace App\Twig\Components;

use App\Name\Store;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Names
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $letter;


    #[LiveProp(writable: true, url: true)]
    public int $limit = 5;

    public function __construct(private readonly Store $nameStore)
    {

    }

    public function getUrlProps(): array
    {
        return ['letter' => $this->letter];
    }

    #[LiveAction]
    public function changeLetter(#[LiveArg] string $letter): void
    {
        $this->letter = $letter;
    }

    #[LiveAction]
    public function changeLetterAndLimit(#[LiveArg] string $letter, #[LiveArg] string $limit): void
    {
        $this->letter = $letter;
        $this->limit = $limit;
    }

    #[LiveAction]
    public function changeLimit(#[LiveArg] string $limit): void
    {
        $this->limit = $limit;
    }

    public function getNames(): array
    {
        return $this->nameStore->getByLetter($this->letter, $this->limit);
    }

    public function getLetters(): array
    {
        return $this->nameStore->getLetters();
    }
}
