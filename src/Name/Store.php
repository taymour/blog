<?php

namespace App\Name;

final class Store
{
    public function all(): array
    {
        return [
            'A' => ['Alice', 'Andrew', 'Amanda', 'Albert', 'Anna', 'Aaron', 'Ashley', 'Amber', 'Austin', 'Abigail'],
            'B' => ['Brian', 'Barbara', 'Benjamin', 'Brittany', 'Brad', 'Brenda', 'Blake', 'Becky', 'Barry', 'Bella'],
            'C' => ['Charles', 'Catherine', 'Chris', 'Cynthia', 'Connor', 'Chloe', 'Caleb', 'Clara', 'Carl', 'Carol'],
        ];
    }

    public function getByLetter(string $letter, int $limit = 10): array
    {
        $letter = strtoupper($letter);
        $namesByLetter = $this->all();

        if (!isset($namesByLetter[$letter])) {
            return [];
        }

        return array_slice($namesByLetter[$letter], 0, $limit);
    }

    public function getLetters(): array
    {
        return ['a', 'b', 'c'];
    }
}
