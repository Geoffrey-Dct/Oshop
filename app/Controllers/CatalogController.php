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
        $this->show('category', $viewVars);
    }

    // Fonction qui affiche le template voulu
    // Avec les données associées à ce template
    public function show($viewName, $viewVars = []) {

        // $viewVars est disponible dans chaque fichier de vue

        // En-tête
        require __DIR__ . '/../views/header.tpl.php';
        // Inclusion du template pour rendu HTML renvoyé par le serveur
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // Pied de page
        require __DIR__ . '/../views/footer.tpl.php';
    }
}