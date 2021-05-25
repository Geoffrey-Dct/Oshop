<?php

// Gestion de nos pages

class CatalogController
{
    // Page catégorie
    public function category($param)
    {
        // on recup l'id de la catégorie
        $categoryId = $param['id'];

         // Les données de la vue
         $viewVars = [
            'category_id' => $categoryId,
        ];

        // On appelle la méthode qui affiche le template
        $this->show('category_products', $viewVars);
    }

    // Page catégorie
    public function type($param)
    {
        // on recup l'id de la catégorie
        $typeId = $param['id'];

        // Les données de la vue
        $viewVars = [
            'type_id' => $typeId,
        ];

        // On appelle la méthode qui affiche le template
        $this->show('type_products', $viewVars);
    }

    public function brand($param)
    {
        // on recup l'id de la catégorie
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
        // on recup l'id de la catégorie
        $productId = $param['id'];

        // Les données de la vue
        $viewVars = [
            'product_id' => $productId,
        ];

        // On appelle la méthode qui affiche le template
        $this->show('product', $viewVars);
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