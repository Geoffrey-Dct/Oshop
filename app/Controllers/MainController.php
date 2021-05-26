<?php

// Gestion de nos pages

class MainController
{
    // Page d'accueil
    public function home()
    {
        $viewVars=[];
        // On appelle la méthode qui affiche le template
        $this->show('home',$viewVars);
    }

    // Mentions légales
    public function legalNotice()
    {
        $this->show('legal_notice');
    }

    //test
    public function test($param)
    {
        // on recup l'id du produit
        $testId = $param['id'];

        // On va chercher les données du produit en BDD
        $categoryModel = new Category();
        $category = $categoryModel->find($testId);
        dump($category);

        $categories = $categoryModel->findAll();
        dump($categories);

        $typeModel = new Type();
        $type = $typeModel->find($testId);
        dump($type);

        $types = $typeModel->findAll();
        dump($types);

        $brandModel = new Brand();
        $brand = $brandModel->find($testId);
        dump($brand);

        $brands = $brandModel->findAll();
        dump($brands);
    }

    // Fonction qui affiche le template voulu
    // Avec les données associées à ce template
    private function show($viewName, $viewVars = []) {


        $absoluteURL = $_SERVER['BASE_URI'];
        // $viewVars est disponible dans chaque fichier de vue
        
        // On va chercher les 5 marques du pied de page
        // qui seront directement accessible dans footer.tpl.php
        $brandModel = new Brand();
        $topFiveBrands = $brandModel->findTopFiveFooter();
        //dd($topFiveBrands);
        
        // En-tête
        require __DIR__ . '/../views/header.tpl.php';
        // Inclusion du template pour rendu HTML renvoyé par le serveur
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // Pied de page
        require __DIR__ . '/../views/footer.tpl.php';
    }
}