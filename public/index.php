<?php

// Le FrontController : point d'entrée unique de l'application

// Autoload de composer pour charger les classe et fonctions situés dans le dossier vender
require __DIR__ . '/../vendor/autoload.php';
// On charge nos classes
require __DIR__ . '/../app/Controllers/MainController.php';
require __DIR__ . '/../app/Controllers/CatalogController.php';



// utilisation d'altorouter

$router =  new AltoRouter();
// on définit le chemin de base de notre dossier de travail sur localhost
// $router->setBasePath('/trinity/s05/S05-projet-oShop-jc-oclock/public/');
// On rend dynamique "le chemin Web" du dossier public
// via la variable $_SERVER['BASE_URI'] fournie par Apache/.htaccess
// Notre code fonctionnera donc sur n'importe quelle VM et même en prod (ex. sur http://oclock.io)
$router->setBasePath($_SERVER['BASE_URI']);

// Notre route pour la home
$router->map(
    // Méthode HTTP
    'GET',
    // La motif de l'URL (la route)
    '/',
    // Destination de la route
    [
        'controller' => 'MainController',
        'method' => 'home',
    ],
    // Nom interne de la route
    'home'
);

// Notre route pour la category
$router->map(
    // Méthode HTTP
    'GET',
    // La motif de l'URL (la route) avec paramètre dynamique
    '/category/[i:id]',
    // Destination de la route
    [
        'controller' => 'CatalogController',
        'method' => 'category',
    ],
    // Nom interne de la route
    'category'
);

$match=$router->match();



// Destination de la route
$destination = $match['target'];

// On détermine le contrôleur à appeler
$controllerName = $destination['controller'];
// On détermine la méthode à appeler
$methodName = $destination['method'];

// Dispatcher

// 1. On instancie notre contrôleur
$controller = new $controllerName(); // Par ex. new MainController()

// 2. On appelle la méthode souhaitée du contrôleur
$controller->$methodName($match['params']); // Par ex. ->home();

