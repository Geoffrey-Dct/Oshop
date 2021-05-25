<?php

/**
 * Représention de la table SQL 'brand'
 */

 class Brand
 {
     /**
      * Les propriétés = les colonnes

      * ! pas de setter sur les id (auto increment Table sql)

      *! Les propriétés sont en snake_case au lieu de camelCase
      * ! c'est une exception à notre convention pour être raccord les colonnes
      */
      private $id;
    private $name;
    private $footer_order;
    private $created_at;
    private $updated_at;

/**
     * Get one brand by its id
     * 
     * @param int $id Product Primary key
     * @return Brand Product found
     */
    public function find(int $id): Brand
    {
        // requète pour une marque
        $sql = "SELECT * FROM brand WHERE id={$id}";


        // On récupère la connexion à PDO
        $pdo = Database::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère un objet de type Brand
        $brand = $pdoStatement->fetchObject('Brand');

        // On le renvoie
        return $brand;
    } 

    /**
     * Get all brands
     */
    public function findAll()
    {
        // requète pour une marque
        $sql = "SELECT * FROM brand";


        // On récupère la connexion à PDO
        $pdo = Database::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère un objet de type Brand
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Brand');

        // On le renvoie
        return $brands;
    }

      /**
       * Get *! Les propriétés sont en snake_case au lieu de camelCase
       */ 
      public function getId()
      {
            return $this->id;
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
     * Get the value of footer_order
     */ 
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
 }

    