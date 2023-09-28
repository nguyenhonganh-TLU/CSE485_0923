
<?php
    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;
    class ArticleController{
        private $twig = null;
        public function __construct()
        {
            $this->twig = new Environment(new FilesystemLoader('views'));

        }
        public function index(){
            $articleService = new ArticleService();
            $articles = $articleService->getAllArticles();

            echo $this->twig->render("article/list_articles.html", ["articles" => $articles]);
        }

        public function add_article(){
            $articleService = new ArticleService();
            $categoryService = new CategoryService();
            $categories = $categoryService->getAllCategories();
            $authorService = new AuthorService();
            $authors = $authorService->getAllAuthors();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_post = date('Y-m-d H:i:s');
            if(isset($_POST['add'])){
                $title = trim($_POST['txtTitle'] ?? '');
                $nameSong = trim($_POST['txtSongName'] ?? '');
                $category = $_POST['category'] ?? '';
                $summary = trim($_POST['txtSummary'] ?? '');
                $content = $_POST['txtContent'] ?? '';
                $author = trim($_POST['author'] ?? '');
                

                $extensions = ['png', 'jpg'];
                $image_article = $_FILES['image']['name'];

                $ext = pathinfo($image_article, PATHINFO_EXTENSION);
                if(!empty($title) and !empty($nameSong) and !empty($summary)){
                    $arguments['title'] = $title;
                    $arguments['nameSong'] = $nameSong;
                    $arguments['category'] = $category;
                    $arguments['summary'] = $summary;
                    $arguments['content'] = $content;
                    $arguments['author'] = $author;
                    $arguments['date_post'] = $date_post;
                    $arguments['image_article'] = 'images/songs/'. $image_article;

                    if(!empty($image_article)){
                        if(in_array($ext, $extensions)){
                            move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/songs/'.$image_article);
                            $articleService->insert($arguments);
                            header("location:?controller=article");
                        }
                        else{
                            $mess = "Hình ảnh chỉ nhận file png hoặc jpg";
                            header("location:?controller=article");
                        }
                    }
                    else{
                        $articleService->insert($arguments);
                        header("location:?controller=article");
                    }

                }
                else{
                    $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                    header("location:?controller=article");
                }

            }
            echo $this->twig->render("article/add_article.html",[
                'categories' => $categories,
                'authors' => $authors,
                "date_post"=>$date_post,
                'mess' => $_GET["mess"] ?? "",
            ]);
        }
        

        public function edit_article(){
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $articleService = new ArticleService();
            $article = $articleService->getArticleId($id);
            $categoryService = new CategoryService();
            $categories = $categoryService->getAllCategories();
            $authorService = new AuthorService();
            $authors = $authorService->getAllAuthors();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $title = trim($_POST['txtTitle'] ?? '');
            $nameSong = trim($_POST['txtSongName'] ?? '');
            $category = $_POST['category'] ?? '';
            $summary = trim($_POST['txtSummary'] ?? '');
            $content = $_POST['txtContent'] ?? '';
            $author = trim($_POST['author'] ?? '');
            $date_post = date('Y-m-d H:i:s');

            $extensions = ['png', 'jpg'];
            $image_article = $_FILES['image']['name'] ?? '';

            $ext = pathinfo($image_article, PATHINFO_EXTENSION);
            if(isset($_POST['update'])){
                if(!empty($title) and !empty($nameSong) and !empty($summary)){
                        $newImage = $image_article;
                        if(empty($image_article)){
                            $arguments['id'] = $id;
                            $newImage = $articleService->getArticleId($id)->getImage();
                        }
                        else{
                            if(in_array($ext, $extensions)){
                                move_uploaded_file($_FILES['image']['tmp_name'], 'assets/'.$newImage);
                            }   
                            else{
                                $mess = "Hình ảnh chỉ nhận file: .png, .jpg";
                                header("location:?controller=article");
                                die();
                            }
                        }
                        $arguments['id'] = $id;
                        $arguments['title'] = $title;
                        $arguments['nameSong'] = $nameSong;
                        $arguments['category'] = $category;
                        $arguments['summary'] = $summary;
                        $arguments['content'] = $content;
                        $arguments['author'] = $author;
                        $arguments['image_article'] = $newImage;
                        $articleService->update($arguments);
                        header("location:?controller=article");
                    }
                    else{
                        $mess = "Bạn vui lòng nhập đầy đủ thông tin";
                        header("location:?controller=article");
                    }
                
                    
                }
        echo $this->twig->render("article/edit_article.html", ["article" => $article,
                "authors" => $authors,
                "categories" => $categories, 
                'mess' => $_GET["mess"] ?? "",
        ]);
    }


        public function delete_article(){
            $articleService = new ArticleService();
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if(isset($_POST['confirm'])){
                $articleService->delete($id);
                header("location:?controller=article");
            }
            echo $this->twig->render("article/delete_article.html");
        }
    }
?>
