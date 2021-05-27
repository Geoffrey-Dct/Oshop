<?php

// Le FrontController : point d'entrée unique de l'application

// Autoload de composer pour charger les classe et fonctions situés dans le dossier vender
require __DIR__ . '/../vendor/autoload.php';
// On charge nos classes
require __DIR__ . '/../app/Utils/Database.php';
// Attention on charge le modoel parent avant l"enfant.
require __DIR__ . '/../app/Models/CoreModel.php';
require __DIR__ . '/../app/Models/Brand.php';
require __DIR__ . '/../app/Models/Product.php';
require __DIR__ . '/../app/Models/Category.php';
require __DIR__ . '/../app/Models/Type.php';
require __DIR__ . '/../app/Controllers/CoreController.php';
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
    // Destination de la route = page que l'on souhaite afficher
    [
        'controller' => 'MainController',
        'method' => 'home',
    ],
    // Nom interne de la route pour générer l'url via $router->generate()
    'home'
);

// Mentions légales
$router->map(
    'GET',
    '/mentions-legales/',
    [
        'controller' => 'MainController',
        'method' => 'legalNotice',
    ],
    // Nom interne de la route pour générer l'url via $router->generate()
    'legal-notice'
);

// Notre route pour la categorie
$router->map(
    'GET',
    // La motif de l'URL (la route) avec paramètre dynamique
    // https://altorouter.com/usage/mapping-routes.html
    '/catalogue/categorie/[i:id]',
    // Destination de la route
    [
        'controller' => 'CatalogController',
        'method' => 'category',
    ],
    // Nom interne de la route pour générer l'url via $router->generate()
    'category'
);

// Produits par type
$router->map(
    'GET',
    '/catalogue/type/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'type',
    ],
    'type'
);

// Les produits par marque
$router->map(
    'GET',
    '/catalogue/marque/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'brand',
    ],
    'brand'
);

// Page produit
$router->map(
    'GET',
    '/catalogue/produit/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'product',
    ],
    'product'
);

//Page test
$router->map(
    'GET',
    '/test/[i:id]',
    [
        'controller' => 'MainController',
        'method' => 'test',
    ],
    'test'
);


$match=$router->match();

// Si une route correspond
if ($match !== false) {
//dd($match['params']);

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
}
else {
    // On envoie une 404
    http_response_code(404);
    echo 'Page non trouvée.';
}
