<?php
require('JSONAPI.php');
class JsonCon
{
	public $api;
	private $pseudo;
	private $bddConnection;
	
    public function __construct($adresse, $post, $utilisateur, $mdp)
    {	
		$api = new JSONAPI($adresse, $post, $utilisateur, $mdp);
		$this->api = $api;
	}
	
	public function GetConnection()
	{
		$c = $this->api->call("server.version");
		return $c;
	}
	
	public function SetConnectionBase($bddConnection)
	{
		$this->bddConnection = $bddConnection;
	}
	
	public function SetPlayerName($pseudo)
	{
		$this->pseudo = $pseudo;
	}
	
	public function SendBroadcast($message)
	{
		$message = str_replace('{PLAYER}', $this->pseudo, $message);
		$message = str_replace('&', '§', $message);
		$this->api->call("chat.broadcast", array($message));
	}
	
	public function GetChat($donnees)
	{
		$c = $this->api->call("streams.formatted_chat.latest", $donnees);
		return $c;
	}
	
	public function SendMessage($donnees)
	{
		$c = $this->api->call("players.name.send_message", $donnees);
		return $c;
	}

	public function getGroups()
	{
		return $this->api->call("groups.all");
	}
	public function getMonnaie()
	{
		return $this->api->call("economy.currency.name_plural");
	}
    public function getFile($addr)
    {
        return $this->api->call('files.read', array($addr));
    }

	public function runConsoleCommand($message)
	{
		$message = str_replace('{PLAYER}', $this->pseudo, $message);
		$message = str_replace('&', '§', $message);
		$this->api->call("runConsoleCommand", array($message));
	}
	
	//Cette fonction à la propriété de gérer les "Grades temporaires" !
	public function AddPlayerToGroup($message, $duree)
	{
		$this->api->call("runConsoleCommand", array('manudel '.$this->pseudo));
		$this->api->call("permissions.addPlayerToGroup", array($this->pseudo, $message));
		require_once('modele/boutique/tempgrades.class.php');
		$tempGrade = new TempGrades($this->bddConnection, $this->pseudo, $duree, $message);
		if($tempGrade->ExistPlayer())
		{
			if($duree == 0)
				$tempGrade->MajJoueurVie();
			else
				$tempGrade->MajJoueur();
		}
		else
		{
			if($duree == 0)
				$tempGrade->CreerJoueurVie();
			else
				$tempGrade->CreerJoueur();
		}
	}

	public function ResetPlayer($pseudo, $grade)
	{
		$this->api->call("runConsoleCommand", array('manudel '.$pseudo));
		if(!empty($grade))
			$this->api->call("permissions.addPlayerToGroup", array($pseudo, $grade));	
	}
	
	public function GivePlayerItem($commande)
	{
		$this->api->call("runConsoleCommand", array('give '.$this->pseudo . ' '. $commande));	
	}

	public function GivePlayerXp($message)
	{
		$this->api->call("givePlayerXp", array($message));
	}

	public function GivePlayerMoney($message)
	{
		$this->api->call("econ.depositPlayer", array($this->pseudo, $message));
	}

	public function GetBanList()
	{
		$file = $this->api->call("files.read", array("banned-players.json"));
		$banlist = $this->api->call("getBannedPlayers");
		return array($banlist, $file);
	}

	public function GetGroupsList()
	{
		return $this->api->call("files.list_directory", array("plugins/GroupManager/worlds"));
	}
	
	// Récupère les pseudo des joueurs et le nombre de joueurs en ligne...
	public function GetServeurInfos()
	{
		$serveurStats['enLignes'] = $this->api->call("getPlayerCount"); 
		// Ceci permet de garder que les résulats intéressant de l'appel JSON. On garde que la variable succès qui contient le résultat.

		$serveurStats['enLignes'] = $serveurStats['enLignes'][0]['success'];
		
		$serveurStats['maxJoueurs'] = $this->api->call("getPlayerLimit"); 
		$serveurStats['maxJoueurs'] = $serveurStats['maxJoueurs'][0]['success'];
		
		$serveurStats['joueurs'] = $this->api->call("getPlayerNames"); 
		$serveurStats['joueurs'] = $serveurStats['joueurs'][0]['success'];
		
		$serveurStats['version'] = $this->api->call("getBukkitVersion");
		$serveurStats['version'] = $serveurStats['version'][0]['success'];
		$serveurStats['version'] = substr($serveurStats['version'], 0, 5);
		
		return $serveurStats;
	}
}

?>
