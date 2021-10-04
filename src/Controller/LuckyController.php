<?php

namespace App\Controller;

use App\Service\LuckyNumberGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    private $logger;
    private $luckyNumberGenerator;

    public function __construct($logger, $luckyNumberGenerator)
    {
        $this->logger = $logger;
        $this->luckyNumberGenerator = $luckyNumberGenerator;
    }

    /**
     * @Route("/lucky/number/{max<\d+>}")
     */
    public function number($max = 100): Response
    {
        $number = $this->luckyNumberGenerator->getRandomNumber($max);

        $this->logger->info('Generating a lucky number: {number}', [
            'number' => $number
        ]);

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
