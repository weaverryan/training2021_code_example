<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('get_lucky_number', [$this, 'getLuckyNumber'])
        ];
    }

    public function getLuckyNumber()
    {
        return 42;
    }
}
