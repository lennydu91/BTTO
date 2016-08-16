<?php
if(isset($_POST['pseudo']) AND isset($_POST['mdp']) AND isset($_POST['mdpConfirm']) AND isset($_POST['email']) AND !empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdpConfirm']) AND !empty($_POST['email']))
{
	session_start();
	function checkCaptcha($response)
		{
			if (isset($_SESSION['captcha_login_form']) && strtolower($_SESSION['captcha_login_form']) === strtolower($response))
			{
				$res = true;
			}
			else
			{
				$res = false;
			}
			unset($_SESSION['captcha_login_form']); 
			return $res;
		}
	if (isset($_POST['CAPTCHA']) AND $_POST['CAPTCHA'] != ''){
		if (checkCaptcha($_POST['CAPTCHA'])){
			$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
			$_POST['mdp'] = htmlspecialchars($_POST['mdp']);
			$_POST['mdpConfirm'] = htmlspecialchars($_POST['mdpConfirm']);
			$_POST['email'] = htmlspecialchars($_POST['email']);
			
			
			if(strlen($_POST['pseudo']) > 16)
				header('Location: ?&page=erreur&erreur=2');
			elseif($_POST['mdp'] != $_POST['mdpConfirm'])
				header('Location: ?&page=erreur&erreur=3');
			else
			{
				$_POST['mdp'] = md5(sha1($_POST['mdp']));
				
				$bddConnection = $base->getConnection();
				require_once('modele/joueur/connection.class.php');
				$userConnection = new Connection($_POST['pseudo'], $bddConnection);
				$ligneReponse = $userConnection->getReponseConnection();
				
				$donneesJoueur = $ligneReponse->fetch();
				if(empty($donneesJoueur['pseudo']))
				{
					require_once('modele/joueur/inscription.class.php');
					$userInscription = new Inscription($_POST['pseudo'], $_POST['mdp'], $_POST['email'], time(), 1, 0, $bddConnection);
					
					$userConnection = new Connection($_POST['pseudo'], $bddConnection);
					$ligneReponse = $userConnection->getReponseConnection();
					
					$donneesJoueur = $ligneReponse->fetch();
					require_once('controleur/joueur/joueurcon.class.php');
					$utilisateur_connection = new JoueurCon($donneesJoueur['id'], $donneesJoueur['pseudo'], $donneesJoueur['email'], $donneesJoueur['rang'], $donneesJoueur['tokens']);
					header('Location: index.php');
				}
				else
				{
					header('Location: ?&page=erreur&erreur=1');
				}
			}
		}
		else
		{
			header('Location: ?&page=erreur&erreur=8');
		}
	}
	else
	{
		header('Location: ?&page=erreur&erreur=0');
	}
}
else
{
	header('Location: ?&page=erreur&erreur=0');
}
?>
