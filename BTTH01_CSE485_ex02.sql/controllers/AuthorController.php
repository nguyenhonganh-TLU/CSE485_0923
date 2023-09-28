<?php
    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    class AuthorController {
        private $twig_author = null;
        public function __construct(){
            $this->twig_author = new Environment(new FilesystemLoader('views'));
        }
        
        public function index() {
            
            $authorService = new AuthorService();
            $authors = $authorService->getAllAuthors();
            
            echo $this->twig_author->render("Authors/index.html", ["authorService" => $authors]);
        }

        public function add_author() {
            
            $authorService = new AuthorService();
            if (isset($_POST['btn'])) {
                $arguments['tentacgia'] = trim($_POST['ten_tgia']);
                $authorService->Insert($arguments);
                header("location:?controller=author");
            }
            
            echo $this->twig_author->render("Authors/add_author.html");
        }

        public function edit_author() {
            $authorService = new AuthorService();
            
            if (isset($_GET['id'])) {
                $arguments['matacgia'] = $_GET['id'];
                $author = $authorService->getById($arguments);

                
                if (isset($_POST['btn'])) {
                    $arguments['tentacgia'] = trim($_POST['ten_tgia']);
                    $arguments['matacgia'] = $_POST['ma_tgia'];
                    $authorService->Update($arguments);
                    header("location:?controller=author");
                }
                
                echo $this->twig_author->render("Authors/edit_author.html", ['author' => $author]);
            }
        }

        public function delete_author() {
        $authorService = new AuthorService();
        $ma_tgia = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $array['mess'] = "Ban co chac muon xoa tac gia nay ?"; 
        $array['display'] = true;
        if(isset($_POST['submit'])){    
            $authorService->delete($ma_tgia);
            header("location:?controller=author");
        }
            
          echo $this->twig_author->render("Authors/delete_author.html", ["array" => $array]);
        }
    }
?>