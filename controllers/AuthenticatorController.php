<?php

class AuthenticatorController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    echo 'aqui';
    exit;
  }

  public function login()
  { //action

    $data  = array();
    $filters = array();

    if (isset($_SESSION['gesdance_online'])) {
      header("Location: " . BASE_URL . "admin"); //redirecionamento
      exit;
    }


    //nome da view, data
    $this->loadView("admin/teachers/login", $data); //view e data
  }


  public function checkLogin()
  {
    $Account = new Account();

    if (!empty($_POST['login'])) {

      $login = filter_input(INPUT_POST, 'login');
      $password = filter_input(INPUT_POST, 'password');

      if ($Account->checkLogin($login, $password)) {

        unset($_SESSION["error"]);
        header("Location: " . BASE_URL . "Admin");
        exit;
      } else {
        $_SESSION["error"] = "Email ou senha incorretos, Tente Novamente";
        header("Location:" . BASE_URL . "Authenticator/login");
        exit;
      }
    }
  }
}
