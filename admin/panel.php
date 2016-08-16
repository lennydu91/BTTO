<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="./admin/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <link href="./admin/css/bootstrap-admin.css" rel="stylesheet" type="text/css">
    <link href="./admin/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="./include/ckeditor/ckeditor.js"></script>

    <!-- Editeur de texte html ! -->
    <script type="text/javascript" src="admin/editor/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        plugins: "code",
        language : 'fr_FR',
        selector: ".editorHTML"
     });
    </script>


    <title>Btto admin panel</title>
</head>


<body>
<?php
    if(isset($_GET['plugin']))
    include('plugin.php');
    else
    {
?>       
<nav class="navbar navbar-default" style="border-radius: 0px;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Btto Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><div style="margin-top: 15px;"><img src="http://infectedz.craftmw.fr/ApiSkins/face.php?user=<?php echo $_Joueur_['pseudo']; ?>&s=32&v=front" /><font style="color: white;"> <?php echo $_Joueur_['pseudo']; ?></font></div></li>
            <li><a href="../index.php?&action=deco"><span class="glyphicon glyphicon-off"></span> Deconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container">
        <div class="col-md-3">
            <nav class="gauche-nav">
          
                <ul class="panel panel-primary nav nav-stacked">
                    <li><a href="./index.php" style="color: black;"><strong><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Retour site</strong></a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#general" style="color: black;"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Général</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#theme"style="color: black;"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Thème</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#accueil" style="color: black;"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Accueil</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#regServeur" style="color: black;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Réglages Serveur</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#pages" style="color: black;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Pages</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#news" style="color: black;"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> News</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#boutique" style="color: black;"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Boutique</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#payement" style="color: black;"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Payement</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#menus" style="color: black;"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Menus</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#voter" style="color: black;"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Voter</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#membres" style="color: black;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Membres</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#widgets" style="color: black;"><span class="glyphicon glyphicon-sound-stereo" aria-hidden="true"></span> Widgets</a></li>
					<li><a data-toggle="collapse" data-parent="#adminPanel" href="#support" style="color: black;"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Support</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#maintenance" style="color: black;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Maintenance</a></li>
                    <li><a data-toggle="collapse" data-parent="#adminPanel" href="#maj" style="color: black;"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span> Mises a jours
                    <?php
                    include "./include/version.php";
                    include "./include/version_distant.php";
                    if($versioncms == $versioncmsrelease) {
                    ?>
                    <span class="badge" style="background-color: rgb(45, 179, 45);">A jours</span>
                    <?php } else { ?>
                    <span class="badge" style="background-color: red;">Pas a jours !!</span>
                    <?php } ?>
                    </a></li>
                </ul>

            </nav>
        </div>
        <div class="col-md-9">
<div class="alert alert-dismissable alert-info">
<button type="button" class="close" data-dismiss="alert">×</button>
<?php
include "./include/note_dev.php";
echo $notedevdistant;
?>
</div>
            
<div class="panel panel-primary panel-group bloc-deroulant-menu" id="adminPanel">

  <div class="panel">
    <div id="general" class="panel-collapse collapse in bloc-deroulant-menu">
    
                    <?php include('donnees/general.php');
                         include('page/general.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="theme" class="panel-collapse collapse bloc-deroulant-menu">
    
                    <?php include('donnees/theme.php');
                         include('page/theme.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="accueil" class="panel-collapse collapse bloc-deroulant-menu">
    
                    <?php include('donnees/accueil.php');
                         include('page/accueil.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="regServeur" class="panel-collapse collapse bloc-deroulant-menu">
                    <?php include('donnees/regServeur.php');
                         include('page/regServeur.php'); ?>     
    </div>
  </div>
  <div class="panel">
    <div id="pages" class="panel-collapse collapse bloc-deroulant-menu">
                    <?php include('donnees/pages.php');
                         include('page/pages.php'); ?>     
    </div>
  </div>
  <div class="panel">
    <div id="news" class="panel-collapse collapse bloc-deroulant-menu">
                    <?php include('donnees/news.php');
                         include('page/news.php'); ?>     
    </div>
  </div>
  <div class="panel">
    <div id="boutique" class="panel-collapse collapse bloc-deroulant-menu">
    
                    <?php include('donnees/boutique.php');
                         include('page/boutique.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="payement" class="panel-collapse collapse bloc-deroulant-menu">
    
                    <?php include('donnees/payement.php');
                         include('page/payement.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="menus" class="panel-collapse collapse bloc-deroulant-menu">
    
                    <?php include('donnees/menu.php');
                         include('page/menu.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="voter" class="panel-collapse collapse bloc-deroulant-menu">
    
                    <?php include('donnees/voter.php');
                         include('page/voter.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="membres" class="panel-collapse collapse bloc-deroulant-menu">
    
                    <?php include('donnees/membres.php');
                         include('page/membres.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="widgets" class="panel-collapse collapse bloc-deroulant-menu">
    
                    <?php include('donnees/widgets.php');
                         include('page/widgets.php'); ?>
    </div>
  </div>

  <div class="panel">
    <div id="maintenance" class="panel-collapse collapse bloc-deroulant-menu">
    
          <?php include('donnees/maintenance.php');
              include('page/maintenance.php'); ?>
    </div>
  </div>

  <div class="panel">
    <div id="support" class="panel-collapse collapse bloc-deroulant-menu">

			<?php include('donnees/support.php');
				 include('page/support.php'); ?>
    </div>
  </div>
  <div class="panel">
    <div id="maj" class="panel-collapse collapse bloc-deroulant-menu">   
                    <?php include('page/update.php'); ?>
    </div>
  </div>
</div>

</div>

    <script src="./theme/<?php echo $_Serveur_['General']['theme']; ?>/js/jquery.js"></script>
    <script src="./theme/<?php echo $_Serveur_['General']['theme']; ?>/js/bootstrap.min.js"></script>
    <?php } ?>
</body>

</html>