<?php
require_once('modele/app/accueil.class.php');
$AccueilData = new AccueilData($bddConnection);

$newsRecup = $AccueilData->GetNews();

$i = 0;
while($newsDonnees = $newsRecup->fetch())
{
	$news[$i]['id'] = $newsDonnees['id'];
	$news[$i]['titre'] = $newsDonnees['titre'];
	$news[$i]['message'] = $newsDonnees['message'];
	$news[$i]['auteur'] = $newsDonnees['auteur'];
	$news[$i]['date'] = $newsDonnees['date'];
	$news[$i]['image'] = $newsDonnees['image'];
	

	$i++;
}

$lectureAccueil = new Lire('modele/config/accueil.yml');
$lectureAccueil = $lectureAccueil->GetTableau();

$sliders = $lectureAccueil['Slider'];
$iSliders = count($lectureAccueil['Slider']);

$couleurInfos[0] = '1';
$couleurInfos[1] = '2';
$couleurInfos[2] = '3';
?>
