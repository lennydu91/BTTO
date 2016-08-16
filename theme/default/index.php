<?php
include('controleur/maintenance.php');
// Si la maintenance est activé
if($maintenance[$i]['maintenanceEtat'] == 1){
    // On vérifie si le joueur est connecté
    if(!(isset($_Joueur_))){
        header('Location: index.php?&redirection=maintenance');
    } elseif($_Joueur_['rang'] == 1) { // On vérifie si il est admin
        if( $maintenance[$i]['maintenancePref'] == 0 ){ // Si la pref vaut 0 les admins ont accès au site avec l'entête en plus
            include('theme/default/maintenance/entete.php');
        } elseif ( $maintenance[$i]['maintenancePref'] == 1 ) { // Si la maintenance vaut 1 les admins n'ont pas accès au site mais ils sont redirigés vers le panel admin
            header('Location: admin.php');
        }
        else { // Si le joueur n'est pas admin il est redirigé vers la page de maintenance
            header('Location: index.php?&redirection=maintenance');
        }
    } else { // Si le joueur n'est pas connecté il est redirigé vers la page de maintenance
        header('Location: index.php?&redirection=maintenance');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title><?php echo $_Serveur_['General']['description'] ?></title>

    <link href="theme/default/css/bootstrap.css" rel="stylesheet">

    <link href="theme/default/css/offcanvas.css" rel="stylesheet">
    <link href="theme/default/css/carousel.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

      <?php
      use xPaw\MinecraftQuery;
      use xPaw\MinecraftQueryException;
      define( 'MQ_SERVER_ADDR', 'btto.fr' );
      define( 'MQ_SERVER_PORT', 25577 );
      define( 'MQ_TIMEOUT', 1 );
      Error_Reporting( E_ALL | E_STRICT );
      Ini_Set( 'display_errors', true );
      require __DIR__ . '/src/MinecraftQuery.php';
      require __DIR__ . '/src/MinecraftQueryException.php';
      $Timer = MicroTime( true );
      $Query = new MinecraftQuery( );
      try
      {
          $Query->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );
      }
      catch( MinecraftQueryException $e )
      {
          $Exception = $e;
      }
      $Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
      $playernb = file_get_contents("http://api-minecraft.net/API/php/ping/playeronline/playeronline.php?ip=btto.fr&port=25565");
      $playernbmax = file_get_contents("http://api-minecraft.net/API/php/ping/maxplayer/maxplayer.php?ip=btto.fr&port=25565");
      ?>
  </head>
	<body>
	<?php if(isset($_Joueur_)) {
		 setcookie('pseudo', $_Joueur_['pseudo'], time() + 86400, null, null, false, true);
	}?>
	<?php
	include('theme/default/entete.php');
	?>
	<?php tempMess(); ?>
	</br>
		<div class="container">
			<?php include('controleur/page.php'); ?>
	<?php include('theme/default/pied.php'); ?>
	</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="theme/default/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="theme/default/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="theme/default/js/ie10-viewport-bug-workaround.js"></script>
    <script src="theme/default/js/offcanvas.js"></script>
	<script src="theme/default/js/jquery.js"></script>
	<script src="theme/default/js/bootstrap.min.js"></script>
	
	<?php // Fonction tirée du bootstrap
	if(isset($modal))
	{
		?>
		<script>  	$('#myModal').modal('toggle') 	</script>
		<?php
	}
	?>
	<script src="theme/default/js/gotop.js"></script>
	</div>
	</body>
</html>
