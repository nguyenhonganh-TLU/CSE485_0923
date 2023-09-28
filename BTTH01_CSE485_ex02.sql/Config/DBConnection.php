<?php
class DBConnection{
    private $conn=null;

    public function __construct(){
        // B1. Kết nối DB Server
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=btth01_cse485;port=3306', 'root','');
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getConnection(){
        return $this->conn;
    }
    public function runSql(string $sql,array $arguments=null)
    {
        if (!$arguments) {
            return $this->conn->query($sql);
        }
        $statement = $this->conn->prepare($sql);
        $statement->execute($arguments);
        return $statement;
    }
}