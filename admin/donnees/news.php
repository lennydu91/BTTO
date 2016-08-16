<?php
$news = $bddConnection->query('SELECT * FROM cmw_news');

$i = 0;
while($donneesNews = $news->fetch())
{
	$tableauNews[$i]['id'] = $donneesNews['id'];
	$tableauNews[$i]['titre'] = $donneesNews['titre'];
	$tableauNews[$i]['message'] = $donneesNews['message'];
	$tableauNews[$i]['auteur'] = $donneesNews['auteur'];
	$tableauNews[$i]['date'] = $donneesNews['date'];
	$tableauNews[$i]['image'] = $donneesNews['image'];
	$i++;
}
?>