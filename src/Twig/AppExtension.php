<?php

namespace App\Twig;

use App\Service\LuckyNumberGenerator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private LuckyNumberGenerator $generator;

    public function __construct(LuckyNumberGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('get_lucky_number', [$this, 'getLuckyNumber'])
        ];
    }

    public function getLuckyNumber()
    {
        return $this->generator->getRandomNumber(100);
    }
}
