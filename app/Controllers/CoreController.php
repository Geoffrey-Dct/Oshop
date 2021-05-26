<?php

class CoreController
{
    // Fonction qui affiche le template voulu
    // Avec les données associées à ce template
    protected function show($viewName, $viewVars = [])
    {

        $absoluteURL = $_SERVER['BASE_URI'];
        // On récupère notre variable $router créé "au niveau global de PHP" càd dans index.php
        global $router;
        // $viewVars est disponible dans chaque fichier de vue
        // On va chercher les 5 marques du pied de page
        // qui seront directement accessible dans footer.tpl.php
        $brandModel = new Brand();
        $topFiveBrands = $brandModel->findTopFiveFooter();
        //dd($topFiveBrands);

        $typeModel = new Type();
        $topFiveTypes = $typeModel->findTopFiveFooter();
        // En-tête
        require __DIR__ . '/../views/header.tpl.php';
        // Inclusion du template pour rendu HTML renvoyé par le serveur
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // Pied de page
        require __DIR__ . '/../views/footer.tpl.php';
    }
}
