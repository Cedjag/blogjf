<?php
require_once 'Modele.php';

class Commentaires extends Modele{


  //Récupère les commentaires selon l'id de l'article.

  public function findAllById($post_id) {
      $sql = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y à %H:%i') AS date
              FROM commentaires
              WHERE id_article = ?";
      $params = [$post_id];
      $comments = $this->prepare($sql,$params,'all');
      $comments_by_id = [];
      foreach ($comments as $comment) {
          $comments_by_id[$comment->id] = $comment;
      }
      return $comments_by_id;
  }


  //Récupèrer les commentaires qui ont des enfants.

  public function findAllWithChildren($post_id, $unset_children = true) {

    $comments = $comments_by_id = $this->findAllById($post_id);
    foreach ($comments as $id => $comment) {
        if ($comment->parent_id != 0) {
            $comments_by_id[$comment->parent_id]->children[] = $comment;
            if ($unset_children) {
                unset($comments[$id]);
            }
        }
    }
    return $comments;
  }


  //récupèrer un commentaire signalé.

  public function findComments() {

    $sql = "SELECT *,DATE_FORMAT(date, '%d/%m/%Y à %H:%i') AS date FROM commentaires WHERE signale=1";
    $req = $this->prepare($sql);
    return $req;
   }

   public function noComments() {
     if ($this->findComments() == false) {
        $msg = '<div class="alert alert-warning">Il n\'y a pas de commentaires signalé.</div>';
        return $msg;
     }
   }


   //insérer un commentaire.
   public function insererCommentaire(){

      if(isset($_POST['content']) && !empty($_POST['content'])){

        $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
        $depth = 0;

        if ($parent_id != 0){

          $sql = 'SELECT id, depth  FROM commentaires WHERE  id = ?';
          $params = [$parent_id];
          $comment = $this->prepare($sql,$params, 'one');
          if ($comment == false) {
            throw new Exception("Ce parent n'existe pas");
          }
          $depth = $comment->depth + 1;
        }
         if ($depth >= 3) {
           echo "Impossible de rajouter un commmentaires";
         }
         else {
           $sql = 'INSERT INTO commentaires SET contenu = ?, auteur = ?, id_article = ?, parent_id = ?, date = NOW(), depth = ?';
           $params = array($_POST['content'], $_POST['nom'], $_GET['id'], $parent_id, $depth);
           $req = $this->prepare($sql,$params);
         }
       }
   }



   //signaler un commentaire

   public function signalerComment() {
     if (isset($_POST['signal'])) {
       $value = $_POST['valeur'];
       $id = $_POST['idval'];
       $sql = 'UPDATE commentaires SET signale = 1 WHERE id_article =? AND id=?';
       $params = [$value, $id];
       $this->prepare($sql, $params);
       $msg = '<div class="alert alert-warning alert-signal">Le commentaire a été signalé.</div>';
       return $msg;
     }
   }


   //fonction qui permet d'approuver un commentaire signalé.

   public function appComment() {
     if (isset($_POST['ok'])) {
       $idEpisode = $_POST['ok'];
       $idComment = $_POST['idOK'];
       $sql = 'UPDATE commentaires SET signale = 0 WHERE id_article=? AND id=?';
       $params = [$idEpisode, $idComment];
       $this->prepare($sql, $params);
       header('Location:index.php?p=dashboard');
     }
   }

   //Fonction qui permet de supprimer un commentaire signalé

   public function deleteComment() {
     if (isset($_POST['trash'])) {
       $idEpisode = $_POST['trash'];
       $idComment = $_POST['idDEL'];
      $sql ='DELETE FROM commentaires WHERE id=? AND id_article=?';
      $params = [$idComment,$idEpisode];
      $this->prepare($sql, $params);
      header('Location:index.php?p=dashboard');
     }
   }


}
