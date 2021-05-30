<?php

// Gestion de nos pages

class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {

        $categoryModel= new Category();
        $categories = $categoryModel->findAllForHome();
        //dd($categories);
        $viewVars=[
            'categories'=> $categories
        ];
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

    
    
}