    <div class="container container-single">
      <?= $msg ?>
      <div class="numeroEpisode">
        <h1><?= $req->titre ?></h1><p><span class="glyphicon glyphicon-time"></span> <?= $req->date ?></p>
      </div>

      <div class="single">
        <div class="">
          <img src="<?= $req->illustration ?>" alt="" class="thumbnailPost">
        </div>
        <div class="singleContent">
          <?= $req->contenu ?>
        </div>
        <hr>
        <h3>Commentaires :</h3><br>
      </div>

        <!-- SECTION Commentaires -->

      <div class="Sectioncommentaires" id="commentaires">
        <?php foreach($comments as $comment): ?>
            <?php require('comments.php'); ?>
        <?php endforeach; ?>
      </div>
      <hr>
      <div class="row">
        <div class="col-lg-12">
          <div id="form-comment" class=" panel panel-default formComment">
            <div class="panel panel-heading">
              <h4>Poster un commentaire : </h4>
              <a href="#"><span class="return"></span></a>
            </div>
            <div class="panel panel-body">
              <form method="post"  class="form-group form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="nom">Nom: </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nom" placeholder="Votre nom..." name="nom">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="content">Commentaire :</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="content" placeholder="Votre commentaire" name="content"></textarea>
                  </div>
                </div>
                <p class="text-right"><button type="submit" class="btn btn-success">Commentez</button></p>
                <input type="hidden" name="parent_id" id="parent_id" value="0" ><!-- Input hiddent pour la gestion des réponses -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
