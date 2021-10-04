<?php

namespace App\Service;

class LuckyNumberGenerator
{
    private int $globalMinNumber;

    public function __construct(int $globalMinNumber)
    {
        $this->globalMinNumber = $globalMinNumber;
    }

    public function getRandomNumber(int $max): int
    {
        return random_int($this->globalMinNumber, $max);
    }
}
