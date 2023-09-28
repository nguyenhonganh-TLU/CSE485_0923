<?php
class StatisticalService
{
    public function countArticle()
    {
        $dbconn = new DBConnection();
        $conn = $dbconn->getConnection();
        return $conn->query('select count(*) from baiviet')->fetchColumn(); 
    }
    public function countCategory()
    {
        $dbconn = new DBConnection();
        $conn = $dbconn->getConnection();
        return $conn->query('select count(*) from theloai')->fetchColumn(); 
    }
    public function countAuthor()
    {
        $dbconn = new DBConnection();
        $conn = $dbconn->getConnection();
        return $conn->query('select count(*) from tacgia')->fetchColumn();
    }
    public function countUser()
    {
        $dbconn = new DBConnection();
        $conn = $dbconn->getConnection();
        return $conn->query('select count(*) from nguoidung')->fetchColumn();;
    }
} 
?>