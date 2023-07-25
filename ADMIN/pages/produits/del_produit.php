
<?php 
	$bd = new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	if (isset($_GET['sup'])) {
	 	$sup=intval($_GET['sup']);

	 	$reqproduit=$bd->prepare("SELECT * FROM produit WHERE id_produit=?");
	 	$reqproduit->execute(array($sup));
	 	$produitinfo=$reqproduit->fetch();

	 	$_SESSION['msgError']="Le produit << ".$produitinfo['libelle']." >> à bien été supprimer!";

	 	$supprimer=$bd->prepare("DELETE FROM produit WHERE id_produit=?");
	 	$del=$supprimer->execute(array($sup));

	 	
	 	header('location:'.$_SERVER['HTTP_REFERER']);
	 
	 }

 ?>