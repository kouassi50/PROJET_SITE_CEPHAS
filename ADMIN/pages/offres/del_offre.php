<?php
$bd = new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	if (isset($_GET['sup'])) {
	 	$sup=intval($_GET['sup']);

	 	$reqoffre=$bd->prepare("SELECT * FROM offres WHERE id_offre=?");
	 	$reqoffre->execute(array($sup));
	 	$offreinfo=$reqoffre->fetch();

	 	$_SESSION['msgError']="L'offre << ".$offreinfo['titre']." >> à bien été supprimer!";

	 	$supprimer=$bd->prepare("DELETE FROM offres WHERE id_offre=?");
	 	$del=$supprimer->execute(array($sup));

	 	
	 	header('location:'.$_SERVER['HTTP_REFERER']);
	 
	 } 

 ?>
 