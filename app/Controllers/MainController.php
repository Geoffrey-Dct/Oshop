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

        dd($category);
    }

    // Fonction qui affiche le template voulu
    // Avec les données associées à ce template
    public function show($viewName, $viewVars = []) {


        $absoluteURL = $_SERVER['BASE_URI'];
        // $viewVars est disponible dans chaque fichier de vue

        // En-tête
        require __DIR__ . '/../views/header.tpl.php';
        // Inclusion du template pour rendu HTML renvoyé par le serveur
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // Pied de page
        require __DIR__ . '/../views/footer.tpl.php';
    }
}