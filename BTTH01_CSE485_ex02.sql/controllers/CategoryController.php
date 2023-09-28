<?php
    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    class CategoryController {
        private $twig_category = null;
        public function __construct(){
            $this->twig_category = new Environment(new FilesystemLoader('views'));
        }
        // Hàm xử lý hành động index
        public function index() {
            // Nhiệm vụ 1: Tương tác với Services/Models
            $categoryService = new CategoryService();
            $categories = $categoryService->getAllCategories();
            // Nhiệm vụ 2: Tương tác với View
            echo $this->twig_category->render("Categories/index.html", ["categoryService" => $categories]);
        }

        public function add_category() {
            // Nhiệm vụ 1: Tương tác với Services/Models
            // echo "Tương tác với Services/Models from Category";
            $categoryService = new CategoryService();
            if (isset($_POST['btn'])) {
                $arguments['tentheloai'] = trim($_POST['ten_tloai']);
                $categoryService->Insert($arguments);
                header("location:?controller=category");
            }
            // Nhiệm vụ 2: Tương tác với View
            echo $this->twig_category->render("Categories/add_category.html");
        }

        public function edit_category() {
            $categoryService = new CategoryService();
            // Lấy ra thông tin cần sửa
            if (isset($_GET['id'])) {
                $arguments['matheloai'] = $_GET['id'];
                $category = $categoryService->getByID($arguments);

                // Nếu nhấn submit thì sẽ tiến hành kiểm tra và sửa thông tin nếu thỏa mãn ĐK
                if (isset($_POST['btn'])) {
                    $arguments['tentheloai'] = trim($_POST['ten_tloai']);
                    $arguments['matheloai'] = $_POST['ma_tloai'];
                    $categoryService->Update($arguments);
                    header("location:?controller=category");
                }
                // Tương tác với View
                echo $this->twig_category->render("Categories/edit_category.html", ['category' => $category]);
            }
        }

        public function delete_category() {
            // Nhiệm vụ 1: Tương tác với Services/Models
            // echo "Tương tác với Services/Models from Category";
            $categoryService = new CategoryService();
            $articleService = new ArticleService();

            $ma_tloai = $_GET['id'];
            $articles = $articleService->getArticleIdTheloai($ma_tloai);
            $list_id = "";
            
            
            // Nếu ko có ràng buộc khóa ngoại với Bài viết
            if (count($articles) == 0) {
                $arguments['matheloai'] = $ma_tloai;
                if (isset($_POST['confirm'])) {
                    $categoryService->delete($arguments);
                    header("location:?controller=category");
                }
            }
            else {
                foreach ($articles as $article) {
                    $list_id = $list_id.$article->getID()." ;";
                }
                // header("location:?controller=category&action=delete_category&id=$ma_tloai&list_id=$list_id");
            }
            
            if ($list_id!="") {
                $array['mess'] = "Ban can xoa cac bai viet co ma = ".$list_id."truoc khi xoa the loai co ma = $ma_tloai"; 
                $array['display'] = false;
            }
            else {
                $array['mess'] = "Ban co chac muon xoa the loai nay ?"; 
                $array['display'] = true;
            }
            // Nhiệm vụ 2: Tương tác với View
            echo $this->twig_category->render("Categories/delete_categoty.html", ["array" => $array]);
        }
    }
?>