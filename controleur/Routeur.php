<?php
require_once 'Controleur.php';


class Routeur {

  private $controleur;

  public function __construct(){
    $this->controleur = new Controleur();
  }

  public function RouteurRequete() {

    if (isset($_GET['p'])) {
      $p = $_GET['p'];
    }
    else {
      $p = 'home';
    }

    ob_start();
    if ($p === 'home') {
      $this->controleur->home();
    }
    elseif ($p === 'single') {
      $this->controleur->single();
    }
    elseif ($p === 'episodes') {
      $this->controleur->episodes();
    }
    elseif ($p === 'login') {
      $this->controleur->login();
    }
    elseif ($p === 'dashboard') {
      $this->controleur->dashboard();
    }
    elseif ($p === 'logout') {
      $this->controleur->logout();
    }
    elseif ($p === 'create') {
      $this->controleur->create();
    }
    elseif ($p === 'update') {
      $this->controleur->update();
    }
    elseif ($p === '404') {
      $this->controleur->error();
    }
    elseif ($p === 'account') {
      $this->controleur->account();
    }
    elseif ($p === 'forget') {
      require 'vue/admin/forget.php';
    }

    $contenu = ob_get_clean();
    require 'vue/default.php';
  }

}
