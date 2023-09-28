<?php
    
class AuthorService{
    public function getAllAuthors(){

       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia";
        $stmt = $conn->query($sql);

        $authors = [];
        while($row = $stmt->fetch()){
            $author = new Author($row['ma_tgia'], $row['ten_tgia']);
            array_push($authors,$author);
        }
        $conn = null;
        return $authors;
    }

    public function getByID(array $arguments){   
        $database = new DBConnection();
        $pdo = $database->getConnection();          // Khoi tao doi tuong PDO
        $stmt = $pdo->prepare("SELECT * FROM tacgia WHERE ma_tgia=:matacgia");
        $stmt->execute($arguments);
        $row = $stmt->fetch();  
        $author = new Author($row['ma_tgia'], $row['ten_tgia']);
        $pdo = null;                                // Dong ket noi
        return $author;
    }

    public function insert(array $arguments){
        $dbconn = new DBConnection();
        $conn   = $dbconn->getConnection();
        $sl = "SELECT MAX(ma_tgia) AS max_id FROM tacgia";
        $result = $conn->query($sl);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $max_id = $row['max_id'];
        $sql    = "INSERT INTO tacgia( ma_tgia, ten_tgia) VALUES($max_id+1, :tentacgia ) ";
        $statement = $conn->prepare($sql);
        $statement->execute($arguments);
        $conn = null;
    }

    public function Update(array $arguments){   
        $database = new DBConnection();
        $pdo = $database->getConnection();          
        $stmt = $pdo->prepare("UPDATE `tacgia` SET `ten_tgia`=:tentacgia WHERE ma_tgia=:matacgia");
        $stmt->execute($arguments);

    }

    public function delete($ma_tgia){
        $dbconn = new DBConnection();
        $conn   = $dbconn->getConnection();
        $sql ="DELETE FROM tacgia WHERE `tacgia`.`ma_tgia` = $ma_tgia";
        $statment = $conn->prepare($sql);
        $statment->execute();
        $conn = null;
    }

}?>