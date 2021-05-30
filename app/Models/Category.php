<?php

/**
 * Représention de la table SQL 'category'
 */

 class Category extends CoreModel
 {
     /**
      * Les propriétés = les colonnes

      * ! pas de setter sur les id (auto increment Table sql)

      *! Les propriétés sont en snake_case au lieu de camelCase
      * ! c'est une exception à notre convention pour être raccord les colonnes
      */
     
     private $name;
     private $subtitle;
     private $picture;
     private $home_order;
     
    

/**
     * Get one category by its id
     * 
     * @param int $id Category Primary key
     * @return Category Category found
     */
    public function find(int $id): Category
    {
        // requète pour un produit
        $sql = "SELECT * FROM category WHERE id={$id}";


        // On récupère la connexion à PDO
        $pdo = Database::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère un objet de type Product
        $category = $pdoStatement->fetchObject('Category');

        // On le renvoie
        return $category;
    } 
 /**
     * Get all products
     */
    public function findAll()
    {
        // requète pour un produit
        $sql = "SELECT * FROM category";


        // On récupère la connexion à PDO
        $pdo = Database::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère un objet de type Product
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'category');

        // On le renvoie
        return $categories;
    }

    public function findAllForHome()
    {
        // requète pour un produit
        $sql = "SELECT * FROM category
               ORDER BY `home_order`";


        // On récupère la connexion à PDO
        $pdo = Database::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère un objet de type Product
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'category');

        // On le renvoie
        return $categories;
    }
     
    

     /**
      * Get the value of name
      */ 
     public function getName()
     {
          return $this->name;
     }

     /**
      * Set the value of name
      *
      * @return  self
      */ 
     public function setName($name)
     {
          $this->name = $name;

          return $this;
     }

     /**
      * Get the value of subtitle
      */ 
     public function getSubtitle()
     {
          return $this->subtitle;
     }

     /**
      * Set the value of subtitle
      *
      * @return  self
      */ 
     public function setSubtitle($subtitle)
     {
          $this->subtitle = $subtitle;

          return $this;
     }

     /**
      * Get the value of picture
      */ 
     public function getPicture()
     {
          return $this->picture;
     }

     /**
      * Set the value of picture
      *
      * @return  self
      */ 
     public function setPicture($picture)
     {
          $this->picture = $picture;

          return $this;
     }

     /**
      * Get the value of home_order
      */ 
     public function getHome_order()
     {
          return $this->home_order;
     }

     /**
      * Set the value of home_order
      *
      * @return  self
      */ 
     public function setHome_order($home_order)
     {
          $this->home_order = $home_order;

          return $this;
     }

     
}