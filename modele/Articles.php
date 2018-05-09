<?php
require_once 'Modele.php';

class Articles extends Modele{


  //Fonction qui retourne les épisodes.

  public function getArticles($nombre = null)
   {

    if ($nombre == 1) {
      $sql = 'SELECT * FROM articles ORDER BY id DESC LIMIT 0, 1';
      $req = $this->query($sql,true);
    }
    else {
      $sql = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM articles ORDER BY id ASC";
      $req =  $this->query($sql);
    }
    return $req;
  }


  //Verifie si il y a un article en bdd

  public function noPost()
  {
    if ($this->getArticles(1) == false || $this->getArticles() == false) {
      $msg = '<div class="jumbotron zeroPost">
                <h1>Pas encore d\'épisode....</h1>
                  <p>Cela arrive bientôt ! </p>
              </div>';
      return $msg;
    }
  }


  //Fonction qui retourne un épisode.

  public function getSingle($idBillet) {

    $sql = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM articles WHERE id=?";
    $params = [$idBillet];
    $result = $this->prepare($sql, $params,'one');

    if ($result == false) {
      header('Location:index.php?p=404');
    }
    else {
      return $result;
    }
  }



  //ajouter un article

  public function addArticle() {

    if (isset($_POST['submit']) AND isset($_POST['titre']) AND isset($_POST['contenu'])) {
      $titre = $_POST['titre'];
      $contenu = $_POST['contenu'];

      if (isset($_FILES['miniature'])) {
        if ($_FILES['miniature']['error'] == 4 ) {
          $chemin = 'public/img/default.jpg';
          $sql = 'INSERT INTO articles(titre,contenu,illustration,date) VALUES(?,?,?,NOW())';
          $params = [$titre, $contenu, $chemin];
          $req = $this->prepare($sql, $params);
          header('Location:index.php?p=episodes');
        }

        else {
          $chemin = 'public/img/' . $titreIMG . '.jpg';
          move_uploaded_file ( $_FILES['miniature']['tmp_name'], $chemin);
          $sql = 'INSERT INTO articles(titre,contenu,illustration,date) VALUES(?,?,?,NOW())';
          $params = [$titre, $contenu, $chemin];
          $req = $this->prepare($sql, $params);
          header('Location:index.php?p=episodes');
        }
      }

    }
  }

  //supprimer un article

  public function deleteArticle() {
    if (isset($_POST['suppArticle'])) {
      $sql = 'DELETE FROM articles WHERE id=?';
      $params = [$_POST['suppArticle']];
      $req = $this->prepare($sql, $params);
       header('Location:index.php?p=dashboard');
    }
  }

  //mettre à jour un article.

  public function updateArticle() {

    if (isset($_POST['update']) AND !empty($_POST['titre']) AND !empty($_POST['contenu']) AND isset($_FILES['miniature'])) {
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];

        if ($_FILES['miniature']['error'] == 4 ) {
          $sql = "UPDATE articles SET titre= ?, contenu= ? WHERE id=?";
          $params = [$titre, $contenu, $_GET['id']];
          $req = $this->prepare($sql, $params);
          header('Location:index.php?p=single&id='. $_POST['update']);
        }
        else {
          $chemin = 'public/img/' . $titreIMG . '.jpg';
          move_uploaded_file ( $_FILES['miniature']['tmp_name'], $chemin);
          $sql = "UPDATE articles SET titre= ?, contenu= ?, illustration= ? WHERE id=?";
          $params = [$titre, $contenu, $chemin, $_GET['id']];
          $req = $this->prepare($sql, $params);
          header('Location:index.php?p=single&id='. $_POST['update']);
        }
      }
  }


}
