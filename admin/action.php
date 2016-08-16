<?php
/*
	Ce fichier PHP effectue telle ou telle action selon le contenu des gets envoyés par la theme(selon le lien sur lequel l'utilisateur à cliqué etc...).
*/
	if(isset($_GET['action']) AND isset($_Joueur_['rang']) AND $_Joueur_['rang'] == 1)
	{
	switch ($_GET['action']) // on utilise ici un switch pour inclure telle ou telle page selon l'action.
	{ 				
		case 'commande': 
		require_once('admin/actions/commande.php');
		break;
		
		case 'general': 
		require_once('admin/actions/general.php');
		break;
		
		case 'editTheme': 
		require_once('admin/actions/editTheme.php');
		break;
		
		case 'supprMembre': 
		require_once('admin/actions/supprMembre.php');
		break;
		
		case 'modifierMembres': 
		require_once('admin/actions/modifierMembres.php');
		break;
		
		case 'creerPage': 
		require_once('admin/actions/creerPage.php');
		break;
		
		case 'supprPage': 
		require_once('admin/actions/supprPage.php');
		break;
		
		case 'boutique': 
		require_once('admin/actions/boutique.php');
		break;
		
		case 'supprCategorie': 
		require_once('admin/actions/supprCategorie.php');
		break;
		
		case 'supprAction': 
		require_once('admin/actions/supprAction.php');
		break;
		
		case 'editerAction': 
		require_once('admin/actions/editerAction.php');
		break;
		
		case 'serveurJsonNew': 
		require_once('admin/actions/serveurJsonNew.php');
		break;
		
		case 'serveurConfig': 
		require_once('admin/actions/serveurConfig.php');
		break;
		
		case 'supprJson': 
		require_once('admin/actions/serveurJsonSuppr.php');
		break;
		
		case 'newLienMenu': 
		require_once('admin/actions/newLienMenu.php');
		break;
		
		case 'editPayement': 
		require_once('admin/actions/editPayement.php');
		break;
		
		case 'creerOffrePaypal': 
		require_once('admin/actions/creerOffrePaypal.php');
		break;
		
		case 'modifierOffrePaypal': 
		require_once('admin/actions/modifierOffrePaypal.php');
		break;
		
		case 'supprimerPaypalOffre': 
		require_once('admin/actions/supprimerPaypalOffre.php');
		break;
		
		case 'supprLienMenu': 
		require_once('admin/actions/supprLienMenu.php');
		break;
		
		case 'supprLienMenuDeroulant': 
		require_once('admin/actions/supprLienMenuDeroulant.php');
		break;
		
		case 'newListeMenu': 
		require_once('admin/actions/newListeMenu.php');
		break;
		
		case 'modifierLien': 
		require_once('admin/actions/modifierLien.php');
		break;
		
		case 'editMenuListe': 
		require_once('admin/actions/editMenuListe.php');
		break;
		
		case 'nouveauMenuListeLien': 
		require_once('admin/actions/nouveauMenuListeLien.php');
		break;
		
		case 'deplacerMenu': 
		require_once('admin/actions/deplacerMenu.php');
		break;
		
		case 'postNavRap': 
		require_once('admin/actions/postNavRap.php');
		break;

		case 'postNews': 
		require_once('admin/actions/postNews.php');
		break;
		
		case 'supprNews': 
		require_once('admin/actions/supprNews.php');
		break;
		
		case 'creerCategorie': 
		require_once('admin/actions/creerCategorie.php');
		break;
		
		case 'creerOffre': 
		require_once('admin/actions/creerOffre.php');
		break;
		
		case 'creerAction': 
		require_once('admin/actions/creerAction.php');
		break;
		
		case 'editRapNav': 
		require_once('admin/actions/editRapNav.php');
		break;
		
		case 'newSlider':
		require_once('admin/actions/newSlider.php');
		break;
		
		case 'changeSlider':
		require_once('admin/actions/changeSlider.php');
		break;
		
		case 'postSlider':
		require_once('admin/actions/postSlider.php');
		break; 
		
		case 'supprSlider':
		require_once('admin/actions/supprSlider.php');
		break; 
		
		case 'postBG':
		require_once('admin/actions/postBG.php');
		break; 
		case 'typeBG':
		require_once('admin/actions/postBG.php');
		break; 
		
		case 'modifierVotesGen':
		require_once('admin/actions/modifierVotesGen.php');
		break;
		
		case 'creerLienVote':
		require_once('admin/actions/creerLienVote.php');
		break;
		
		case 'supprLienVote':
		require_once('admin/actions/supprLienVote.php');
		break;
		
		case 'editPage':
		require_once('admin/actions/editPage.php');
		break;
		
		case 'creerSection':
		require_once('admin/actions/creerSection.php');
		break;
		
		case 'supprSection':
		require_once('admin/actions/supprSection.php');
		break;
		
		case 'editPermissions':
		require_once('admin/actions/editPermissions.php');
		break;
		
		case 'supprTicket':
		require_once('admin/actions/supprTicket.php');
		break;
		
		case 'newWidget':
		require_once('admin/actions/newWidget.php');
		break;
		
		case 'supprWidget':
		require_once('admin/actions/supprWidget.php');
		break;
		
		case 'upWidget':
		require_once('admin/actions/upWidget.php');
		break;
		
		case 'downWidget':
		require_once('admin/actions/downWidget.php');
		break;
		
		case 'editNews':
		require_once('admin/actions/editNews.php');
		break;

		case 'resetVotes':
		$bddConnection->exec('DELETE FROM cmw_votes'); 
		break;
		
		case 'etatTickets':
		require_once('admin/actions/etatTickets.php');
		break;

		case 'switchMaintenance':
		require_once('admin/actions/switchMaintenance.php');
		break;
		
		case 'switchPreference':
		require_once('admin/actions/switchPreference.php');
		break;

		case 'editMessage':
		require_once('admin/actions/editMessage.php');
		break;

		case 'editMessageAdmin':
		require_once('admin/actions/editMessageAdmin.php');
		break;
		// Si le joueur a rentré un url contenant une valeur d'action innexistant?
		default:
		header('Location: admin.php');
	}
}
header('Location: admin.php');
?>
