
  <div class="container update">
      <script type="text/javascript" src="../../public/js/tiny_mce/tiny_mce.js"></script>
      <script type="text/javascript">
        tinyMCE.init({
        mode : "textareas"
        });
      </script>
    <h2><i class="fa fa-pencil"></i> Modifier le chapitre :  <b><?=$billet->titre ?></b></h2>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group admin-titre">
        <input type="text" name="titre" value="<?= $billet->titre ?>" class="form-control">
      </div>
      <div class="form-group">
        <b style="color:green">Image d'illustration du chapitre :</b> <input type="file" name="miniature">
        <i>Si vous ne souhaitez pas changer l'image d'illustration du chapitre, merci d'ignorer.</i>
      </div>
      <div class="form-group">
        <textarea id="update" name="contenu"><?= $billet->contenu ?></textarea>
        <br /><br />
      </div>
      <div class="form-group">
        <button type="submit" name="update" class="btn btn-success" value="<?= $billet->id ?>">Mettre à jour</button><br>
      </div>
    </form>
  </div>
