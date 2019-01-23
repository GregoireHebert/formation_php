<?php

declare(strict_types=1);

namespace App\Controller;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Chuck extends AbstractController
{
    public function __invoke(Client $client, LoggerInterface $logger): Response
    {
        $response = $client->get('/jokes/random');
        $data = json_decode($response->getBody()->getContents());

        throw new \RuntimeException('');
    }
}
