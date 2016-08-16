<h2><center>Offres d'achats de jetons</center></h2>
<div class="alert alert-dismissable alert-success">
    <center>Les jetons sont la monnaie virtuelle du site. Les joueurs achètent des jetons avec leurs dons, et les utilisent dans la boutique.</center>
</div>


<h3><center>Starpass/Paypal ID</center></h3>
<div class="alert alert-dismissable alert-success">
    <center>Vous trouverez ces informations sur le site officiel de votre méthode de payement !</center>
</div>
<form class="form-horizontal default-form" method="post" action="?&action=editPayement">
	<center>
	<h4>Activer le payement par:</h4>
	<label class="checkbox-inline">
	  	<input type="checkbox" name="paypal" <?php if($lectureP['paypal'] == true) echo 'checked'; ?>> Paypal
	</label>
	<label class="checkbox-inline">
	  	<input type="checkbox" name="starpass" <?php if($lectureP['starpass'] == true) echo 'checked'; ?>> Starpass
	</label>
	</center>
	</br>
	<h4>Starpass</h4>
	<div class="form-group">
		<label class="col-sm-4 control-label">Starpass IDD</label>
		<div class="col-sm-8">
			<input type="text" name="starpassIDD" class="form-control" value="<?php echo $lectureP['starpassIDD']; ?>" placeholder="Trouvez le sur votre panel starpass..." >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Starpass IDP</label>
		<div class="col-sm-8">
			<input type="text" name="starpassIDP" class="form-control" value="<?php echo $lectureP['starpassIDP']; ?>" placeholder="Pareil que pour IDD" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Starpass Jetons Donnés</label>
		<div class="col-sm-8">
			<input type="text" name="starpassJetons" class="form-control" value="<?php echo $lectureP['starpassJetons']; ?>" placeholder="ex: 500" >
		</div>
	</div>
	</br>
    <h4>PayPal</h4>
    <div class="radio">
    	<label>
    		<input type="radio" name="paypalMethodeAPI" value="1"<?php if($lectureP['paypalMethodeAPI'] == 1) echo ' checked'; ?>>
    		Utiliser mon email pour être payé par paypal.
    	</label>
    </div>
    <div class="form-group">
		<label class="col-sm-4 control-label">Email paypal</label>
		<div class="col-sm-8">
			<input type="text" name="paypalEmail" class="form-control" value="<?php echo $lectureP['paypalEmail']; ?>" placeholder="L'email lié à votre compte paypal." >
		</div>
    </div>
    <div class="radio">
    	<label>
    		<input type="radio" name="paypalMethodeAPI" value="2"<?php if($lectureP['paypalMethodeAPI'] == 2) echo ' checked'; ?>>
    		Utiliser mon compte buisness paypal pour être payé.
    	</label>
    </div>
	<div class="form-group">
		<label class="col-sm-4 control-label">User Paypal</label>
		<div class="col-sm-8">
			<input type="text" name="paypalUser" class="form-control" value="<?php echo $lectureP['paypalUser']; ?>" placeholder="Demmandez une signature API pour connaitre cette donnée" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Mot de passe Paypal</label>
		<div class="col-sm-8">
			<input type="text" name="paypalPass" class="form-control" value="<?php echo $lectureP['paypalPass']; ?>" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Signature API Paypal</label>
		<div class="col-sm-8">
			<input type="text" name="paypalSignature" class="form-control" value="<?php echo $lectureP['paypalSignature']; ?>" >
		</div>
	</div>
	</br>
    <input type="submit" class="btn btn-warning pull-right" value="Valider les changements !" />
</form>
</br>
</br>
<h3><center>Créer une offre paypal</center></h3>
<div class="alert alert-dismissable alert-success">
    <center>Une fois votre compte paypal config, vous devez créer une offre paypal pour que les joueurs puissent l'acheter !</center>
</div>
<form class="form-horizontal default-form" method="post" action="?&action=creerOffrePaypal">
	<div class="form-group">
		<label class="col-sm-4 control-label">Titre de l'offre</label>
		<div class="col-sm-8">
			<input type="text" name="nom" class="form-control" placeholder="ex: 5€ - 1500Jetons" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Message de l'offre</label>
		<div class="col-sm-8">
			<input type="text" name="description" class="form-control" placeholder="ex: < img src=... / >" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Prix de l'offre</label>
		<div class="col-sm-8">
			<input type="number" name="prix" class="form-control" placeholder="ex: 5" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Jetons donnés</label>
		<div class="col-sm-8">
			<input type="number" name="jetons_donnes" class="form-control" placeholder="ex: 1500" >
		</div>
	</div>
    <input type="submit" class="btn btn-warning pull-right" value="Créer l'offre !" />
</form>
</br>
</br>
<h3><center>Mes offres PayPal</center></h3>
<?php  if(isset($paypalOffres) AND !empty($paypalOffres)){ ?>
<div class="alert alert-dismissable alert-success">
    <center>Vous pouvez avoir une multitude d'offres paypal, vous pourrez gérer ces offres en les modifiants ou les supprimant !</center>
</div>
<ul class="nav nav-tabs">
<?php for($i = 0; $i < count($paypalOffres) ; $i++)   { ?>
  <li <?php if($i == 0) echo 'class="active"'; ?>><a href="#payementPaypal<?php echo $i; ?>" data-toggle="tab">Offre #<?php echo $i; ?></a></li>
<?php } ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<?php for($i = 0; $i < count($paypalOffres) ; $i++)   { ?>
<div class="tab-pane well <?php if($i == 0) echo 'active'; ?>" id="payementPaypal<?php echo $i; ?>">
    <form class="form-horizontal default-form" method="post" action="?&action=modifierOffrePaypal&id=<?php echo $paypalOffres[$i]['id']; ?>">
	    <div class="form-group">
		    <label class="col-sm-4 control-label">Titre de l'offre</label>
		    <div class="col-sm-8">
			    <input type="text" name="nom" value="<?php echo $paypalOffres[$i]['nom']; ?>" class="form-control" placeholder="ex: 5€ - 1500Jetons" >
		    </div>
	    </div>
	    <div class="form-group">
		    <label class="col-sm-4 control-label">Message de l'offre</label>
		    <div class="col-sm-8">
			    <input type="text" name="description" value="<?php echo $paypalOffres[$i]['description']; ?>" class="form-control" placeholder="ex: < img src=... / >" >
		    </div>
	    </div>
	    <div class="form-group">
		    <label class="col-sm-4 control-label">Prix de l'offre</label>
		    <div class="col-sm-8">
			    <input type="number" name="prix" value="<?php echo $paypalOffres[$i]['prix']; ?>" class="form-control" placeholder="ex: 5" >
		    </div>
	    </div>
	    <div class="form-group">
		    <label class="col-sm-4 control-label">Jetons donnés</label>
		    <div class="col-sm-8">
			    <input type="number" name="jetons_donnes" value="<?php echo $paypalOffres[$i]['jetons_donnes']; ?>" class="form-control" placeholder="ex: 1500" >
		    </div>
	    </div>
        <a href="?&action=supprimerPaypalOffre&id=<?php echo $paypalOffres[$i]['id']; ?>" class="btn btn-danger col-sm-4 pull-left">Supprimer</a>
        <input type="submit" class="btn btn-warning col-sm-offset-2 col-sm-4 pull-right" value="Modifier Les changements !" />
    </form>    
	</br>
	</br>
</div>
<?php } echo '</div>';  } else echo '<div class="alert alert-dismissable alert-success">Vous devez créer une offre paypal !</div>'; ?> 
