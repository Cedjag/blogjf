
    <header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="tagline tagline-home"><i class="fa fa-plane"></i> Billet simple pour l'Alaska</h1>
            </div>
        </div>
    </div>
    </header>

    <div class="container">
      <div class="about">
        <div class="row">
          <div class="col-md-8">
            <h3>À propos du roman</h3>
            <?= $about->about ?>
          </div>
          <div class="col-md-4">
            <div class="well">
              <small>Biographie</small>
              <h4>Jean Forteroche</h4>
              <p><?= $admin->biographie ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="lastEpisode">
        <h1 class="page-header">
          <span class="glyphicon glyphicon-book"></span> Le dernier chapitre
        </h1>
        <!-- First Blog Post -->
        <?php if($req != false) : ?>
          <h2>
            <a href="index.php?p=single&id=<?=$req->id ?>"><?= $req->titre ?></a>
          </h2>
          <p>
            <span class="glyphicon glyphicon-time"></span> Publié le <?= $req->date ?>
          </p>
          <img class="img-responsive" src="<?= $req->illustration ?>" alt="">
          <hr>
          <p>
            <?= substr($req->contenu, 0, 512) . '....' ?>
          </p>
          <a class="btn btn-primary" href="index.php?p=single&id=<?= $req->id ?>">
            Lire la suite <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <hr>
        <?php endif; ?>
<?= $msg ?>
      </div>
    </div>
