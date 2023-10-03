<?php
require_once APP_ROOT.'/app/models/Song.php';
class SongService{
    public function getAllSong(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null){
            $sql = "SELECT * FROM song";
            $stmt = $conn->query($sql);

            while ($row = $stmt->fetch()){
                $song = new Song($row['idSong'], $row['nameSong'], $row['singer'], $row['idCategory']);
                $songs[] = $song;
            }
            return $songs;
        }
    }
}