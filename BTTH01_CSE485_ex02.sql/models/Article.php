<?php 
class Article{
    private $id;
    private $title;
    private $nameSong;
    private $idCategory;
    private $summary;
    private $content;
    private $idAuthor;
    private $datetime;
    private $image;

    public function __construct($id, $title, $nameSong, $idCategory, $summary, $content, $idAuthor, $datetime, $image){
        $this->id = $id;
        $this->title = $title;
        $this->nameSong = $nameSong;
        $this->idCategory = $idCategory;
        $this->summary = $summary;
        $this->content = $content;
        $this->idAuthor = $idAuthor;
        $this->datetime = $datetime;
        $this->image = $image;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }
    public function getNameSong(){
        return $this->nameSong;
    }
    public function getIdCategory(){
        return $this->idCategory;
    }
    public function getSummary(){
        return $this->summary;
    }
    public function getContent(){
        return $this->content;
    }
    public function getIdAuthor(){
        return $this->idAuthor;
    }

    public function getDatetime(){
        return $this->datetime;
    }

    public function getImage(){
        return $this->image;
    }


}