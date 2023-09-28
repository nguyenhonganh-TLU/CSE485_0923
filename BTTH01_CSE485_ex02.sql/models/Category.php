<?php
class Category {
    // Thuộc tính
    private $idCategory;
    private $nameCategory;

    public function __construct($idCategory, $nameCategory){
        $this->idCategory = $idCategory;
        $this->nameCategory = $nameCategory;
    }

    // Setter và Getter
    public function getIdCategory(){
        return $this->idCategory;
    }

    public function getNameCategory(){
        return $this->nameCategory;
    }

    public function setNameCategory($nameCategoryNew){
        $this->nameCategory = $nameCategoryNew;
    }
}
?>