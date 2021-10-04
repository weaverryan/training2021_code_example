<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class LuckyController
{
    public function number($max): Response
    {
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}
