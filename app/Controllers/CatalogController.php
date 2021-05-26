<?php

// Gestion de nos pages

class CatalogController
{
    // Page catégorie
    public function category($param)
    {
        // on recup l'id de la catégorie
        $categoryId = $param['id'];

         // On va chercher les données de la catégorie en BDD
         $productModel = new Product();
         $products = $productModel->findAll();
         
        
         // Les données de la vue
         $viewVars = [
             'category_id' => $categoryId,
             'products'=>$products,
             
         ];
 
         // On appelle la méthode qui affiche le template
         $this->show('category_products', $viewVars);
    }

    // Page type
    public function type($param)
    {
        // on recup l'id du type
        $typeId = $param['id'];

        // Les données de la vue
        $viewVars = [
            'type_id' => $typeId,
        ];

        // On appelle la méthode qui affiche le template
        $this->show('type_products', $viewVars);
    }

    // page marque
    public function brand($param)
    {
        // on recup l'id de la marque
        $brandId = $param['id'];

        // Les données de la vue
        $viewVars = [
            'brand_id' => $brandId,
        ];

        // On appelle la méthode qui affiche le template
        $this->show('brand_products', $viewVars);
    }

    public function product($param)
    {
        // on recup l'id du produit
        $productId = $param['id'];

        // On va chercher les données du produit en BDD
        $productModel = new Product();
        $product = $productModel->find($productId);

        //dd($product);

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