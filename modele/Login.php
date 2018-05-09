<?php
require_once 'Modele.php';

class Login extends Modele{

  public $p;

  //valide ou non la connexion à l'espace admin.

  public function Connexion()
  {

    if (isset($_POST['submit'])) {

      $identifiant = htmlspecialchars(trim($_POST['identifiant']));
      $password = htmlspecialchars(($_POST['password']));
      $erreurs = [];

      if (empty($identifiant) || empty($password)) {
        $erreurs['empty'] = "Tout les champs doivent être remplis !";
      }
      elseif ($this->is_admin($identifiant, $password) == 0) {
        $erreurs['exist'] = "Cet administrateur n'existe pas.";
      }
      if (!empty($erreurs)) {

        foreach ($erreurs as $erreur) {
          $erreur = '<div class="alert alert-danger" role="alert">'. $erreur . '</div>';
        }
        return $erreur;
      }
      else {
        $_SESSION['admin'] = $identifiant;
        header('Location:index.php?p=dashboard');
      }
    }

  }

  //Exécute une requête qui vérifie si les données passées en paramètre existent dans la bdd

    public function is_admin($identifiant, $password){

        $sql = 'SELECT * from admin WHERE username = ? AND password = ?';
        $params = [$identifiant, $password];
        $req = $this->prepare($sql, $params,'one');
        return $req;
    }

    public function alreadyConnect(){

      if (isset($_SESSION['admin'])) {
        header('Location:index.php?p=dashboard');
      }
    }

    public function notLogin() {
      if ($this->p != 'login' && !isset($_SESSION['admin']) && !isset($_SESSION['forget'])) {
        header('Location:index.php?p=login');
      }
    }

    public function newPass() {

      if (isset($_POST['new']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['identifiant'])) {
        $mdp1 = sha1($_POST['password']);
        $mdp2 = sha1($_POST['password2']);
        $identifiant = $_POST['identifiant'];
        if ($mdp1 == $mdp2) {
          $sql = "UPDATE admin SET username = '$identifiant', password = '$mdp2' WHERE id=1";
          $req = $this->query($sql);
          $msg = '<div class="alert alert-success" role="alert">L\'identifiant et le mot de passe ont bien été changés.</div>';
          return $msg;
        }
        else {
          $msg = '<div class="alert alert-danger" role="alert"> Les mots de passe doivent être identiques !</div>';
          return $msg;
        }
      }
      elseif(isset($_POST['new']) && empty($_POST['password']) && empty($_POST['password2']) && empty($_POST['identifiant'])) {
        $msg = '<div class="alert alert-danger" role="alert">Veuillez remplir tout les champs.</div>';
        return $msg;
      }

    }


}
