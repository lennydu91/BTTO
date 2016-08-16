<?php
$req = $bddConnection->prepare('DELETE FROM cmw_news WHERE id = :id');
$req->execute(array ( 'id' => $_GET['newsId']) );
?>