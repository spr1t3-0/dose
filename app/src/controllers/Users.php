<?php

class Users extends Controller {

  private $User;

  public function __Construct() {
    $this->User = $this->model('User');
  }

/**
* Login a user
*
* @param string login
* @param string password
*
* @return void
**/
public function login() {
  if(!isset($_POST["login"]) || !isset($_POST["password"])){die('400 - bad request');}
  $login = $_POST["login"];
  $password = $_POST["password"];
  if (($user = $this->User->getByLogin($login)) !== null) {
    if(password_verify($password, $user["password"])) {
      session_start();
      $_SESSION["login"] = $login;
      header("Location: /");
    } else {
      error_log('Failed login attempt for user ' . $login . '\n', 3, __DIR__ . '/../../../writable/logs/auth_fail.log');
      $this->render('auth/login', ["title" => "login", "error" => "true"]);
  }
}
  else {
    $this->render('login', ["title" => "login", "error" => 'true']);
  }
}

/**
* Destroy a session
*
* @return void
**/
public function logout():void {
  session_destroy();
  header("Location: /");
}

/**
* Control the view component for adding a new user
*
*
*
**/
public function addView():void {
  if($this->User->isLoggedIn() && $this->User->isRoot()) {
    $this->render('users/add', ["title" => "add new user"]);
  } else {
    $this->render('auth/login', ["title" => '403 - access denied']);
  }
}

/**
* Add a new user
*
* @return void
**/
public function add():void {
  if(!isset($_POST["login"]) || !isset($_POST["password"])){die('400 - bad request');}
  $login = $_POST["login"];
  $password = $_POST["password"];
  if($this->User->isLoggedIn() && $this->User->isRoot()) {
    $password = PASSWORD_HASH($password, PASSWORD_DEFAULT);
    $this->User->create($login, $password);
  }
  else {
    die('403 - access denied');
  }
}
}









