<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    /**
     * @Route("/lucky/number/{max<\d+>}")
     */
    public function number($max = 100): Response
    {
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/api/lucky/number/{max<\d+>}")
     */
    public function numberApi($max): Response
    {
        $number = random_int(0, $max);

        return new JsonResponse([
            'number' => $number,
        ]);
    }
}
