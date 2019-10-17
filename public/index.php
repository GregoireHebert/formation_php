<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use App\Action\Tamagochi;
use App\Bus\LifeBus;
use App\Handlers\CircleOfLifeHandler;
use App\Handlers\DatabaseHandler;
use App\Handlers\DoctorHandler;
use App\Handlers\EatHandler;
use App\Handlers\RunHandler;
use App\Handlers\SleepHandler;
use App\Repository\MoutonRepository;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

session_start();

$loader = new FilesystemLoader(__DIR__.'/../Template');
$twig = new Environment($loader, [
    'cache' => __DIR__.'/../var/cache',
]);

$request = Request::createFromGlobals();

$repository = new MoutonRepository();

$bus = new LifeBus();
$bus->setHandlers([
    new CircleOfLifeHandler(),
    new DatabaseHandler($repository),
    new DoctorHandler(),
    new EatHandler(),
    new RunHandler(),
    new SleepHandler(),
]);

$route = new Route('/', [
    '_controller' => Tamagochi::class,
]);
$routes = new RouteCollection();
$routes->add('home', $route);

$context = new RequestContext('/');

$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match($request->getPathInfo());

$controllerClass = $parameters['_controller'] ?? null;
if (null !== $controllerClass) {
    $controller = new $controllerClass($bus, $repository, $twig);
}

/**
 * @var Tamagochi $controller
 */
$response = $controller->playTurn($request);
$response->send();

