<?php
require 'Autoload.php';
Autoload::register();

class Controleur {

  public $Article;
  private $Commentaires;
  private $Login;
  private $routeur;
  private $app;

  public function __construct() {

    $this->Article = new Articles();
    $this->Commentaires = new Commentaires();
    $this->Login = new Login();
    $this->App = new App();

  }


  public function home() {
    $req = $this->Article->getArticles(1);
    $msg = $this->Article->noPost();
    $admin = $this->App->getBio();
    $about = $this->App->getAbout();
    $vue = require 'vue/home.php';
  }


  public function single() {

    $req = $this->Article->getSingle($_GET['id']);
    $msg = $this->Commentaires->signalerComment();
    $this->Commentaires->insererCommentaire();
    $comments = $this->Commentaires->findAllWithChildren($_GET['id']);
    $vue = require 'vue/single.php';
  }

  public function episodes() {
    $billets = $this->Article->getArticles();
    $msg = $this->Article->noPost();
    $url = $this->Article->getUrl();
    $vue = require 'vue/episodes.php';

  }

  public function login(){
    $erreur = $this->Login->Connexion();
    $this->Login->alreadyConnect();
    $vue = require 'vue/admin/login.php';
  }

  public function dashboard(){
    $this->Login->notLogin();
    $update = $this->Article->updateArticle();
    $comment = $this->Commentaires->findComments();
    $msg = $this->Commentaires->noComments();
    $this->Commentaires->appComment();
    $delete = $this->Commentaires->deleteComment();
    $req = $this->Article->getArticles();
    $this->Article->deleteArticle();
    require 'vue/admin/dashboard.php';
  }

  public function create() {
    $this->Login->notLogin();
    $this->Article->addArticle();
    require 'vue/admin/create.php';
  }

  public function update() {
    $this->Login->notLogin();
    $this->Article->updateArticle();
    $billet = $this->Article->getSingle($_GET['id']);
    require 'vue/admin/update.php';
  }

  public function account() {
    $this->App->setBio();
    $this->App->setAbout();
    $this->Login->notLogin();
    $msg = $this->Login->newPass();
    $bio = $this->App->getBio();
    $about = $this->App->getAbout();
    require 'vue/admin/account.php';
  }

  public function logout() {
    require 'vue/admin/logout.php';
  }

  public function error() {
    require 'vue/404.php';
  }
}
