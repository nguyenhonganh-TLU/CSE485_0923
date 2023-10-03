<?php
class Song{
    private $idSong;
    private $nameSong;
    private $singer;
    private $idCategory;
    public function __construct($idSong, $nameSong, $singer, $idCategory){
        $this->idSong = $idSong;
        $this->nameSong = $nameSong;
        $this->singer = $singer;
        $this->idCategory = $idCategory;
    }
    public function getidSong(){
        return $this->idSong;
    }
    public function setidSong($idSong){
        $this->idSong = $idSong;
    }

    public function getnameSong(){
        return $this->nameSong;
    }
    public function setnameSong($nameSong){
        $this->nameSong = $nameSong;
    }

    public function getsinger(){
        return $this->singer;
    }
    public function setsinger($singer){
        $this->singer = $singer;
    }

    public function getidCategory(){
        return $this->idCategory;
    }
    public function setidCategory($idCategory){
        $this->idCategory = $idCategory;
    }
}