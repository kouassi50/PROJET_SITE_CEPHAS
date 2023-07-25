<?php 
	$db = new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	
	if (isset($_GET['sup'])) {
	 	$sup=intval($_GET['sup']);

	 	$reqformation=$db->prepare("SELECT * FROM formations WHERE id_formation=?");
	 	$reqformation->execute(array($sup));
	 	$formationinfo=$reqformation->fetch();

	 	$_SESSION['msgError']="La formation << ".$formationinfo['titre']." >> à bien été supprimer!";

	 	$supprimer=$db->prepare("DELETE FROM formations WHERE id_formation=?");
	 	$del=$supprimer->execute(array($sup));

	 	
	 	header('location:'.$_SERVER['HTTP_REFERER']);
	 
	 }

 ?>