<?php

/**
 * Classe qui représente un modèle de table SQL
 * et qui va contenir les propriétés et les méthodes communes à 
 * tous les models présents et futurs (générique au possible)
 * 
 * Core = convention = noyau, classe principale => CoreModel
 * parfois appelé "Base" => BaseModel
 */

 class CoreModel
 {

    // les propriétés communes à tous les modèles 
    // => on passe la visibilité à "protected"
    // pour que les enfants y aient accès (si besoin !)


     protected $id;
     protected $created_at;
     protected $updated_at;

     /**
       * Get the value communes à tous les modèles
       */ 
      public function getId()
      {
            return $this->id;
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

