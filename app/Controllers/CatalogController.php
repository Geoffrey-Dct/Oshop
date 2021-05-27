<?php

// Gestion de nos pages

class CatalogController extends CoreController
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
        //$product = $productModel->find($productId);

      

        $product = $productModel->findJoinedToAll($productId);
         //dd($product);

         //todo Appeller la methode show()
         $viewVars = [
            
            'product'=> $product
         ];

         $this->show('product', $viewVars);

    }

}