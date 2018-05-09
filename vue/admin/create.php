  <div class="container container-single">
    <div class="breadcrumb">
      <a href="index.php?p=dashboard"> << Retour au tableau de bord.</a>
    </div>
      <script type="text/javascript" src="../../public/js/tiny_mce/tiny_mce.js"></script>
      <script type="text/javascript">
              tinyMCE.init({
              mode : "textareas"
		      });
      </script>
    <h1><span class="glyphicon glyphicon-pencil"></span> Rédiger un chapitre  <hr></h1>
      <div class="row">
        <form method="post" enctype="multipart/form-data">
        <div class="col-md-10">
          <div class="form-group">
            <input type="text" name="titre" placeholder="Saissisez le titre..." class="form-control">
          </div>
          <div class="form-group">
            <b style="color:blue">Image d'illustration du chapitre :</b> <input type="file" name="miniature">
          </div>
          <div class="form-group">
		      <textarea id="update" name="contenu" rows="25" ></textarea>
		      <br /><br />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <input type="submit" name="submit" value="Publier" class="btn btn-success">
          </div>
        </div>
      </form>
      </div>

  </div>
