<?php
require_once APP_ROOT.'/app/models/Category.php';
class CategoryService{
    public function getAllCategory(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null){
            $sql = "SELECT * FROM category";
            $stmt = $conn->query($sql);

            $events = [];
            while ($row = $stmt->fetch()){
                $category = new Category($row['idCategory'], $row['tenCategory'],);
                $categories[] = $category;
            }
            return $categories;
        }
    }
}