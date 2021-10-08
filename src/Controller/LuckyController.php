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
    private $luckyNumberGenerator;

    public function __construct(LuckyNumberGenerator $luckyNumberGenerator)
    {
        $this->luckyNumberGenerator = $luckyNumberGenerator;
    }

    /**
     * @Route("/lucky/number/{max<\d+>}")
     */
    public function number(LoggerInterface $logger, $max = 100): Response
    {
        $this->denyAccessUnlessGranted('VIEW', $max);

        $number = $this->luckyNumberGenerator->getRandomNumber($max);

        $logger->info('Generating a lucky number: {number}', [
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
