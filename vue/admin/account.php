<div class="account">
  <div class="container">
    <div class="row row-account">
      <h1>Mon compte.</h1>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel panel-heading">
            Mon compte
          </div>
          <div class="panel panel-body">
            <form method="post" class="form-group">
              <div class="form-group">
                <input type="text" name="identifiant" placeholder="Nouvel identifiant..." class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Nouveau mot de passe..." class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password2" placeholder="Retaper mot de passe..." class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" name="new" class="btn btn-primary">Valider</button>
              </div>
            </form>
            <?= $msg ?>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel panel-heading">
            À propos
          </div>
          <div class="panel panel-body">
            <form method="post" class="form-group">
              <div class="form-group">
                <textarea id="about" name="aboutContent" class="form-control"><?= $about->about ?></textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="setAbout" class="btn btn-primary">Valider</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel panel-heading">
            Biographie
          </div>
          <div class="panel panel-body">
            <form method="post" class="form-group">
              <div class="form-group">
                <textarea id="bio" class="form-control" name="bioContent"><?= $bio->biographie ?></textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="bio" class="btn btn-primary">Valider</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
