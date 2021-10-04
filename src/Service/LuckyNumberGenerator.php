<?php

namespace App\Service;

class LuckyNumberGenerator
{
    public function getRandomNumber(int $max, int $globalMinNumber): int
    {
        return random_int($globalMinNumber, $max);
    }
}
