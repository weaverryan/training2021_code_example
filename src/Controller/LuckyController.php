<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    private int $globalMinNumber;

    public function __construct(int $globalMinNumber)
    {
        $this->globalMinNumber = $globalMinNumber;
    }

    /**
     * @Route("/lucky/number/{max<\d+>}")
     */
    public function number($max = 100): Response
    {
        $number = random_int($this->globalMinNumber, $max);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
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
