<?php

// Le FrontController : point d'entrée unique de l'application

// Autoload de composer pour charger les classe et fonctions situés dans le dossier vender
require __DIR__ . '/../vendor/autoload.php';
// On charge nos classes
require __DIR__ . '/../app/Controllers/MainController.php';
require __DIR__ . '/../app/Controllers/CatalogController.php';

// Récupérer le paramètre GET "page" de l'URL
// Il nous indique la page/vue à afficher, donc le template à utiliser

if (isset($_GET['page'])) {
    // Page présente dans l'URL
    $page = $_GET['page'];
}
else {
    // Sinon, page par défaut = index.php
    $page = '/';
}

// Définissons/configurons des routes pour "auiguiller notre code"
// C'est la page demandée qui va conditionner la "destination"
// de la dite route
$routes = [
    '/' => [
        'controller' => 'MainController',
        'method' => 'home',
    ],
    
    '/category' => [
        'controller' => 'CatalogController',
        'method' => 'category',
    ],
];
dump($routes);
// Destination de la route
$destination = $routes[$page];

// On détermine le contrôleur à appeler
$controllerName = $destination['controller'];
// On détermine la méthode à appeler
$methodName = $destination['method'];

// Dispatcher

// 1. On instancie notre contrôleur
$controller = new $controllerName(); // Par ex. new MainController()

// 2. On appelle la méthode souhaitée du contrôleur
$controller->$methodName(); // Par ex. ->home();

