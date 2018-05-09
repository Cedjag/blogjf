<?php
require_once 'Modele.php';

class App extends Modele{


  //Permet de modifier la bio.

  public function setBio() {
    if (isset($_POST['bio']) & !empty($_POST['bioContent'])) {
      $biographie = $_POST['bioContent'];
      $sql = "UPDATE admin SET biographie = ? WHERE id=1";
      $params = [$biographie];
      return $this->prepare($sql,$params);
    }
  }


  //Permet de récupèrer la bio

  public function getBio() {

    $sql = 'SELECT biographie FROM admin';
    return $this->query($sql, true);
  }


  //Permet de récupèrer le contenu à propos

  public function getAbout() {
    $sql = 'SELECT about FROM admin';
    return $this->query($sql, true);
  }


  //permet d'insérer le contenu de la section à propos.

  public function setAbout() {
    if (isset($_POST['setAbout']) && !empty($_POST['aboutContent'])) {
      $about = $_POST['aboutContent'];
      $sql = 'UPDATE admin SET about = ? WHERE id=1';
      $params = [$about];
      return $this->prepare($sql,$params);
    }
  }
}
