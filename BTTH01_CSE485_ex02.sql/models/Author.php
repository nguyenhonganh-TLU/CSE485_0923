<?php
    class Author{
        private $idAuthor;
        private $nameAuthor;


        public function __construct($idAuthor, $nameAuthor){
            $this->idAuthor = $idAuthor;
            $this->nameAuthor = $nameAuthor;
        }

        public function getIdAuthor(){
            return $this->idAuthor;
        }
        public function getNameAuthor(){
            return $this->nameAuthor;
        }

    }
?>