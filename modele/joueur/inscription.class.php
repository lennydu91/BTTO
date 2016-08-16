<?php
class Inscription
{
	private $reponseConnection;
	
    public function __construct($pseudo, $mdp, $email, $temps, $newletter, $rang, $bdd)
    {	
		$reponseConnection = $bdd->prepare('INSERT INTO cmw_users (pseudo, mdp, email, anciennete, newsletter, rang) VALUES (:pseudo, :mdp, :email, :anciennete, :newsletter, :rang)');
		$reponseConnection->execute(array(
			'pseudo' => $pseudo,
			'mdp' => $mdp,
			'email' => $email,
			'anciennete' => $temps,
			'newsletter' => $newletter,
			'rang' => $rang,
			));
	}
	
	public function getReponseConnection()
	{
		return $this->reponseConnection;
	}
}
?>