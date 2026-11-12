<?php
class Model{
    //ATTRIBUT
    private PDO $bdd;
    //CONSTRUCT
    public function __construct(PDO $newBdd){
        $this->bdd = $newBdd;
    }
    //GETTER ET SETTER
    
    /**
     * Get the value of bdd
     *
     * @return PDO
     */
    public function getBdd(): PDO
    {
        return $this->bdd;
    }
    //METHODS

}