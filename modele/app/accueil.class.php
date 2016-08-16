<?php
class AccueilData
{
	private $bdd;
	
    public function __construct($bdd)
    {	
		$this->bdd = $bdd;
	}
	
	public function GetNews()
	{
		$news = $this->bdd->query('SELECT * FROM cmw_news ORDER BY date DESC');
		return $news;
	}
}
?>