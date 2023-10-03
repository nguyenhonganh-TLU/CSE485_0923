<?php
class Category{
    private $idCategory;
    private $nameCategory;
    public function __construct($idCategory, $nameCategory){
        $this->idCategory = $idCategory;
        $this->nameCategory = $nameCategory;
    }
    public function getidCategory(){
        return $this->idCategory;
    }
    public function setidCategory($idCategory){
        $this->idCategory = $idCategory;
    }

    public function getnameCategory(){
        return $this->nameCategory;
    }
    public function setnameCategory($nameCategory){
        $this->nameCategory = $nameCategory;
    }

}