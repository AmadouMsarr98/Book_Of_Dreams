<?php
$bdd = new PDO('mysql:host=localhost;dbname=humhub;charset=utf8', 'root', 'root');
$req = $bdd->prepare('UPDATE task SET status = :status  WHERE id = :id');
$req->execute(array(
	'status' => $_GET['status'],
	'id' => $_GET['idTask']
	));
?>
