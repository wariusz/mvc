<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("It works! This is the default welcome page.");

    return $response;
})->setName('root');

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

use Slim\Views\Twig;

$app->get('/time', function (Request $request, Response $response) {
    $viewData = [
        'now' => date('Y-m-d H:i:s')
    ];

    return $this->get(Twig::class)->render($response, 'time.twig', $viewData);
});

use Psr\Log\LoggerInterface;
use Slim\Container;

$app->get('/logger-test', function (Request $request, Response $response) {
    /** @var Container $this */
    /** @var LoggerInterface $logger */

    $logger = $this->get(LoggerInterface::class);
    $logger->error('My error message!');

    $response->getBody()->write("Success");

    return $response;
});

