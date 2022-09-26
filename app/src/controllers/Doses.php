<?php

Class Doses extends Controller {
  private $User;
  private $Dose;

  public function __construct() {
    $this->User = $this->model("User");
    $this->Dose = $this->model("Dose");
  }

/**
* List recorded doses for the logged in user
* Index page of the app after logging in
*
* @return void
**/
  public function list():void {
    if($this->User->isLoggedIn()) {
          $data = $this->Dose->getFromUser($this->User->current()["id"]);
          $this->render('doses/list', ["title" => "home", "data" => $data]);
    } else {
      $this->render('auth/login', ["title" => "403 - access denied"]);
    }
  }

/**
* Render the view for adding a new dose record
*
* @return void
**/
  public function addView():void {
    if($this->User->isLoggedIn()) {
      $this->render('doses/add');
    } else {
      $this->render('auth/login', ["title" => "403 - access denied"]);
    }
  }

  /**
  * Render the view for editing a dose record
  *
  * @return void
  **/
  public function editView(int $id):void {
    if($this->User->isLoggedIn()) {
      $data = $this->Dose->getById($id);
      $this->render('doses/edit', ["title" => "edit yor dose entry", "data" => $data]);
    }
  }


  /**
  * Handle a incoming POST Request to add a new dose record
  *
  * @return void
  **/
  public function add():void {
    if($this->User->isLoggedIn()) {
      if(!isset($_POST["substance"]) || !isset($_POST["dose"]) || !isset($_POST["unit"]) || !isset($_POST["dosed_at"])){die('400 - bad request');}

      $uid = $this->User->current["id"];
      $substance = $_POST["substance"];
      $dose = $_POST["dose"];
      $unit = $_POST["unit"];
      $dosed_at = $_POST["dosed_at"];

      $this->Dose->add($uid, $substance, $dose, $unit, $dosed_at);
      header("Location: /");
    } else {
      die('403 - access denied');
    }
  }


  /**
  * Delete a dose entry
  *
  * @return void
  **/
  public function delete($id) {
    if($this->User->isLoggedIn()) {
      $this->Dose->delete($id);
      header("Location: /");
    } else {
      die('403 - access denied');
    }
  }



  }

 ?>
