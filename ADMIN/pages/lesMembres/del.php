<?php
/*Connexion à la base de donnée*/
$bd = new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

	if (isset($_GET['sup']) AND $_GET['sup']>0) {
	 	$sup=intval($_GET['sup']);

	 	/*requete de suppresion d'un l'élément de la table qu'on ne connait pas*/
	 	$supprimer=$bd->prepare("DELETE FROM membres WHERE id_mem=?");
	 	$del=$supprimer->execute(array($sup));
	 	/*réfère toi à la même page après suppresion*/
	 	header('location:'.$_SERVER['HTTP_REFERER']);
		#fin de suppression


	 	/*requete permetant d'afficher le pseudo qu'on ne connait pas*/
	 	$requser=$bd->prepare("SELECT * FROM membres WHERE id_mem=?");
	 	$requser->execute(array($sup));
	 	$userinfo=$requser->fetch();

	 	$_SESSION['msgError']="L'utilisateur << ".$userinfo['pseudo']." >> à bien été supprimer!";

	 	
	 
	 } 

 ?>
 