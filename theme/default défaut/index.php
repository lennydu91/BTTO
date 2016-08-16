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
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Lenny Louis, <?php echo $_Serveur_['General']['name']; ?>">
    <link href="theme/default/css/style.css" rel="stylesheet" type="text/css">
    <link href="theme/default/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
    <?php
    if(isset($_GET['page']))
    {
        if($_GET['page'] == 'boutique')
            echo '<link href="theme/default/css/boutique.css" rel="stylesheet" type="text/css">';
        if($_GET['page'] == 'token')
            echo '<link href="theme/default/css/tokens.css" rel="stylesheet" type="text/css">';
        if($_GET['page'] == 'admin')
            echo '<link href="theme/default/css/admin.css" rel="stylesheet" type="text/css">';
        if($_GET['page'] == 'voter')
            echo '<link href="theme/default/css/voter.css" rel="stylesheet" type="text/css">';
        if($_GET['page'] == 'profil')
            echo '<link href="theme/default/css/profil.css" rel="stylesheet" type="text/css">';
        if($_GET['page'] == 'support')
            echo '<link href="theme/default/css/support.css" rel="stylesheet" type="text/css">';
    } else {?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href="theme/default/css/bootstrap.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="theme/default/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="theme/default/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="theme/default/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <?php }
    ?>
    <title><?php echo $_Serveur_['General']['description'] ?></title>
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
<div id="content" class="member_notable">
    <div class="pageWidth body-content">
        <div class="pageContent">
            <?php include('controleur/page.php'); ?>
        </div>
    </div>
</div>
<?php include('theme/default/pied.php'); ?>
<script src="theme/default/js/jquery.js"></script>
<script src="theme/default/js/bootstrap.min.js"></script>

<!-- Les formulaires de connexion pop-up -->
<?php include('theme/default/formulaires.php'); ?>

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
