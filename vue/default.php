<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="public/img/favicon.ico" />
    <script src="public/js/tinymce/tinymce.min.js"></script>
    <title><?= 'Billet simple pour l\'Alaska'?></title>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                      <a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a>
                    </li>
                    <li>
                        <a href="index.php?p=episodes">Chapitres</a>
                    </li>
                    <li>
                        <a href="index.php?p=login">Espace d'administration</a>
                    </li>
                </ul>
            </div>

        </div>

    </nav>
    <div class="body">
      <?= $contenu ?>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 footer">
            <p>Site développé par<a href="http://cedricjager.com"> Cédric JAGER</a></p></div>
          </div>
        </div>

      </div>
    </footer>
</div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
      <script src="public/js/app.js"></script>
  </body>
  </html>
