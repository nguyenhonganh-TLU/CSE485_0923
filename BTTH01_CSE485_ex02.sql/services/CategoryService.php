<?php

// use function PHPSTORM_META\argumentsSet;

    // include_once("config/DBConnection.php");
    // include_once("models/Category.php");
    class CategoryService {
        public function getAllCategories() {
            // 4 bước thực hiện
            $dbConn = new DBConnection();
            $conn = $dbConn->getConnection();           // Khoi tao doi tuong PDO

            // B2. Truy vấn
            $sql = "SELECT * FROM theloai";
            $stmt = $conn->query($sql);

            // B3. Xử lý kết quả
            $categories = [];
            while($row = $stmt->fetch()){
                $category = new Category($row['ma_tloai'], $row['ten_tloai']);
                array_push($categories, $category);
            }
            $conn = null;                               // Dong ket noi

            // Mảng (danh sách) các đối tượng Article Model
            return $categories;
        }

        public function getByID(array $arguments){   
            $database = new DBConnection();
            $pdo = $database->getConnection();          // Khoi tao doi tuong PDO
            $stmt = $pdo->prepare("SELECT * FROM theloai WHERE ma_tloai=:matheloai");
            $stmt->execute($arguments);
            $row = $stmt->fetch();  
            $category = new Category($row['ma_tloai'], $row['ten_tloai']);
            $pdo = null;                                // Dong ket noi
            return $category;
        }

        public function Insert(array $arguments){   
            $database = new DBConnection();
            $pdo = $database->getConnection();          // Khoi tao doi tuong PDO

            $stmt = $pdo->prepare("INSERT INTO `theloai`(`ma_tloai`, `ten_tloai`) VALUES (null,:tentheloai)");
            $stmt->execute($arguments);
            $pdo = null;                                // Dong ket noi
        }

        public function Update(array $arguments){   
            $database = new DBConnection();
            $pdo = $database->getConnection();          // Khoi tao doi tuong PDO
            $stmt = $pdo->prepare("UPDATE `theloai` SET `ten_tloai`=:tentheloai WHERE ma_tloai=:matheloai");
            $stmt->execute($arguments);

        }

        public function Delete(array $arguments){   
            $database = new DBConnection();
            $pdo = $database->getConnection();          // Khoi tao doi tuong PDO

            $stmt = $pdo->prepare("DELETE from `theloai`WHERE ma_tloai=:matheloai");
            $stmt->execute($arguments);
            $pdo = null;                                // Dong ket noi
        }
    }
?>