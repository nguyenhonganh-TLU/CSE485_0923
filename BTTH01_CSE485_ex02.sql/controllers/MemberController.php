<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class MemberController
{
    private $twig = null;

    public function __construct()
    {
        $this->twig = new Environment(new FilesystemLoader('views'));
    }
    public function login()
    {
        session_start();
        if (isset($_SESSION['check']))
              header('location:index.php?action=index_admin');
        if (isset($_POST['btnLogin'])) {
            if (empty($_POST['txtUser']) || empty(($_POST['txtPass']))) {
                echo $this->twig->render('member/login.html', ["error" => "Vui lòng điền mật khẩu tài khoản"]);
            } else {
                $user = $_POST["txtUser"];
                $pass = $_POST["txtPass"];
                $memberService = new MemberService();
                $member = $memberService->getMember($user);
                if (count($member) == 0) {
                    echo $this->twig->render('member/login.html', ["error" => "Tài khoản không tồn tại"]);
                } else {
                    $pass_save = $member[0]->getPass();
                    if ($member[0]->getActivation() != 1) {
                        echo $this->twig->render('member/login.html', ["error" => "Tài khoản chưa kích hoạt"]);
                    } else if (password_verify($pass, $pass_save)) {
                        $_SESSION["check"] = $_POST["txtUser"];
                        header("location:index.php?action=index_admin");
                    } else {
                        echo $this->twig->render('member/login.html', ["error" => "Sai mật khẩu"]);
                    }
                }
            }
        } else {
            echo $this->twig->render('member/login.html', ["error" => ""]);
        }
    }
    public function signin()
    {
        if (isset($_POST['btnSignIn'])) {
            if (empty($_POST['txtUser']) || empty(($_POST['txtMail'])) || empty(($_POST['txtPass'])) || empty(($_POST['txtPass1']))) {
                echo $this->twig->render('member/register.html', ["error" => "Vui lòng điền đầy đủ thông tin"]);
            } else {
                $user = trim($_POST['txtUser']);
                $email = trim($_POST['txtMail']);
                $pass = trim($_POST['txtPass']);
                $pass1 = trim($_POST['txtPass1']);
                if ($pass != $pass1) {
                    echo $this->twig->render('member/register.html', ["error" => "Mật khẩu xác nhận không đúng"]);
                }
                $memberService = new MemberService();
                $check = $memberService->getMemberMail($user, $email);
                if (count($check) != 0) {
                    echo $this->twig->render('member/register.html', ["error" => "Tên đăng nhập và email đã được sử dụng"]);
                } else {
                    $password_hash = password_hash($pass, PASSWORD_DEFAULT);
                    $code_hash = md5(random_bytes(20));
                    $arguments['user'] = $user;
                    $arguments['mail'] = $email;
                    $arguments['pass'] = $password_hash;
                    $arguments['activation_code'] = $code_hash;
                    $memberService->insert($arguments);
                    $path = '<a href="localhost/CSE485_2023_BTTH03/index.php?email=' . $email . '&active=' . $code_hash . '&controller=Member&action=active' . '"><button">Kích hoạt tài khoản</button></a>';
                    $emailServer = new MyEmailServer();
                    $emailServer = new EmailServer($emailServer);
                    $emailServer->send("$email", "", "Kích hoạt tài khoản email", "$path");
                    echo $this->twig->render('member/register.html', ["error" => "Đăng ký thành công. Vui lòng xác nhận email"]);
                }
            }           
        } else {
            echo $this->twig->render('member/register.html', ["error" => ""]);
        }
    }
    public function active()
    {
        if (isset($_GET['email']) && isset($_GET['active'])) {
            $arguments['email'] = $_GET['email'];
            $arguments['active'] = $_GET['active'];
            $memberService = new MemberService();
            $memberService->update($arguments);
            echo $this->twig->render('member/active.html', ['mess_success' => 'Kích hoạt tài khoản email thành công']);
        } else {
            echo $this->twig->render('member/active.html', ['mess_pail' => 'Bạn phải đăng nhập từ đường dẫn được chúng tôi gửi qua email đã đăng ký']);
        }

    }
    public function logout()
    {
        session_start();
        if (isset($_SESSION['check'])) {
            unset($_SESSION['check']);
            header("Location:index.php?controller=Member&action=login");
        }
    }
}