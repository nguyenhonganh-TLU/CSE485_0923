<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    private $twig=null;

    public function __construct()
    {
        $this->twig = new Environment(new FilesystemLoader('views'));
    }
    public function index()
    {
        $articleService = new ArticleService();
        $categoryService = new CategoryService();

        $articles = $articleService->getAllArticles();
        echo $this->twig->render('home/index.html', ["articles" => $articles]);
    }
    public function search(){
        $articleService = new ArticleService();
        if(isset($_POST['search'])){
            $name = $_POST['nameSong'];
            $articles = $articleService->getArticleText($name);
            echo $this->twig->render("home/index.html",["articles"=>$articles]);
        }
}
public function detail()
{
    $articleService = new ArticleService();
    $article = $articleService->getArticleId($_GET['id']);
    echo $this->twig->render('home/detail.html', ["article" => $article]);
}
public function index_admin()
    {
        $statisticalService = new StatisticalService();
        session_start();
        if (!isset($_SESSION['check']))
              header('location:?controller=Member&action=login');
        $array['member'] = $statisticalService->countUser();;
        $array['author'] = $statisticalService->countAuthor();;
        $array['category'] =  $statisticalService->countCategory();;
        $array['article'] = $statisticalService->countArticle();
        echo $this->twig->render("admin/index.html",["array"=>$array]);
    }
}