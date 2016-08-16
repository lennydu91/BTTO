<?php
/*
	Ce fichier PHP effectue telle ou telle action selon le contenu des gets envoyés par la theme(selon le lien sur lequel l'utilisateur à cliqué etc...).
*/
if(isset($_GET['action']))
{
    switch ($_GET['action']) // on utilise ici un switch pour inclure telle ou telle page selon l'action.
    {
        // Appellée quand on clique sur un bouton de déconnection (bouton disponible quand connecté.
        case 'deco':
            // Destruction des sessions + redirection sur l'accueil.
            session_destroy();
            header('Location: index.php');
            break;

        // Appellé lorsqu'on envoie un formulaire de conneciton.
        case 'connection':
            // On appelle la classe qui gère la connection et redirection...
            require_once('controleur/player/connection.php');
            break;

        // Comme connection mais pour les inscriptions
        case 'inscription':
            include('controleur/player/inscription.php');
            break;

        case 'changeMdp':
            include('controleur/player/changeMdp.php');
            header('Location: index.php');
            break;

        case 'passRecoverConfirm':
            include('controleur/player/recuperationMailLink.php');
            header('Location: index.php');
            break;

        case 'passRecover':
            include('controleur/player/changeMdpMail.php');
            //header('Location: index.php');
            break;
        // Appellé lorsqu'on appuie sur le bouton "acheter" d'un produit. L'id de l'offre est aussi passé en argument(sinon une erreur doit être gérée pour éviter que ça plante).
        case 'achat':
            include('controleur/boutique/achat.php');
            // Cette fois on redirige sur la boutique(car c'est la dernière page visitée avant l'action.
            header('Location: ?&page=boutique');
            break;

        // Même principe que la boutique, mais sur la page "tokens" dans la section PayPal.
        case 'achatPaypal':
            // On traite l'erreur de l'offre(comme boutique).
            if(isset($_GET['offer']))
                include('controleur/paypal/index.php');
            else
                header('Location: index.php'); // Simple redirection en cas d'erreur.
            break;

        // Même principe que la boutique, mais sur la page "tokens" dans la section PayPal.
        case 'verif_paypal':
            include('controleur/paypal/verif_paypal.php');
            break;

        // Lorsque paypal renvoie le Token au serveur(PHP Curl).
        case 'achatPaypalReturn':
            include('controleur/paypal/return.php');
            header('Location: index.php');
            break;

        // Appellé lorsqu'un code starpass est validé.
        case 'starpass':
            include('controleur/starpass.php');
            // On redirige sur la page d'achat de token, le joueur vas surrement racheter un code(quoi !? Pas le droit de rêver?).
            header('Location: ?page=token&success=true');
            break;

        case 'monelib':
            include('controleur/tokens/monelib.php');
            // On redirige sur la page d'achat de token, le joueur vas surrement racheter un code(quoi !? Pas le droit de rêver?).
            //header('Location: &page=token');
            break;

        // Appellé quand le joueur valide son vote. Action issue d'un formulaire. Les autres infos sont en POST et non en GET.
        case 'voter':
            include('controleur/voter/vote.php');
            break;

        case 'post_ticket':
            include('controleur/support/ticket.php');
            header('Location: index.php?&page=support');
            break;

        case 'post_ticket_commentaire':
            include('controleur/support/ticketCommentaire.php');
            header('Location: index.php?&page=support');
            break;

        case 'changeProfil':
            include('controleur/player/changeProfil.php');
            //header('Location: index.php?&page=profil&profil=' .$_Joueur_['pseudo']);
            break;

        case 'changeProfilAutres':
            include('controleur/player/changeProfilAutres.php');
            break;

        case 'ticketEtat':
            include('controleur/support/ticketEtat.php');
            header('Location: index.php?&page=support');
            break;

        // Si le joueur a rentré un url contenant une valeur d'action innexistant?
        default:
            header('Location: index.php');
    }
}
?>
