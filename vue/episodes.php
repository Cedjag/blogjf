
<header class="business-header header-episodes">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="tagline tagline-episodes">Liste des chapitres :</h1>
        </div>
    </div>
</div>
</header>

<div class="container">
  <?= $msg ?>
</div>

<div class="container">
  <?php foreach ($billets as $episodes) : ?>
    <h2>
      <a href="<?= $url.$episodes->id ?>"><?= $episodes->titre ?></a>
    </h2>
    <img src="<?= $episodes->illustration ?>" class="thumbnailPost">
    <p><span class="glyphicon glyphicon-time"></span> Publié le <?= $episodes->date ?></p>
      <?= substr($episodes->contenu, 0, 512) . '....' ?>
      <p><a href="index.php?p=single&id=<?= $episodes->id ?>">Lire la suite</a></p><hr>
  <?php endforeach; ?>
</div>
