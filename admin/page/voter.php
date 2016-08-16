
<div class="row">
	<a href="?action=resetVotes" class="btn btn-danger btn-block">Réinitialiser les votes ..</a>
	</br>
	<h1><center>Réglages des votes</center></h1>
</div>
<h3><center>Configuration générale des votes</center></h3>

<form method="post" action="?&action=modifierVotesGen">
	<div class="form-group">
		<label>Message affiché lors du vote pour que les autres joueurs pensent à voter</label>
		<input type="text" name="message" class="form-control" value="<?php echo $lectureVotes['message']; ?>" />
	</div>
	<div class="row">

		<div class="col-md-5">
			<label>Le joueur obtiendra sa récompense sur:
			<select name="methode" class="form-control">	  	
                <option value="<?php echo $lectureVotes['methode']; ?>" />
				<option value="1"> Le serveur où il est en ligne </option>
				<option value="2"> Le serveur de la catégorie </option>
			</select>
		</div>				

		<div class="form-group col-md-4">
			<label>ID de l'item donné</label>
			<input type="text" name="id" value="<?php echo $lectureVotes['id']; ?>" class="form-control" value="264" />
    	</div>

		<div class="form-group col-md-3">
			<label>Quantité donnée</label>
			<input type="text" name="quantite" value="<?php echo $lectureVotes['quantite']; ?>" class="form-control" value="4" />
    	</div>
		
	</div>
	<input type="submit" class="btn btn-warning"/>
</form>
</br>
<h3><center>Création d'un lien de vote</center></h3>
<form method="POST" action="?&action=creerLienVote">
	<div class="form-group">
		<label>Lien de vote du serveur</label>
		<select name="serveur" class="form-control">	  	
			<?php for($i = 0; $i < count($lectureServs); $i++) {		?>
         	   <option value="<?php echo $i ?>"> <?php echo $lectureServs[$i]['nom']; ?> </option>
			<?php 	}	?>
		</select>
	</div>
	<div class="form-group">
		<label>Lien de vote</label>
		<input type="text" name="lien" placeholder="ex: http://serveurs-minecraft.com/...../" class="form-control" />
	</div>
	<div class="form-group">
		<label>Titre du lien</label>
		<input type="text" name="titre" placeholder="ex: Voter sur McServ !" class="form-control" />
	</div>
	<div class="form-group">
		<label>Temps de vote</label>
		<input type="number" name="temps" placeholder="ex: 84600 pour 24h" class="form-control" />
	</div>
	<input type="submit" class="btn btn-warning" />
</form>

<h3>Supprimer un lien...<h3>
<?php
for($i = 0; $i < count($lectureVotes['liens']); $i++)
{	?>
	<a href="?&action=supprLienVote&id=<?php echo $i; ?>" class="btn btn-danger row col-md-12">Supprimer <?php echo $lectureVotes['liens'][$i]['titre']; ?></a>
<?php
} 	?>