<?php 
session_start();

	if (isset($_GET['p'])) {
		$page=$_GET['p'];
	}else{
		$page="home";
	}



	ob_start();
	if ($page==="home") {
		require "pages/acceuil_admin.php";
		
	}elseif($page==="ajout-membre"){
		
		require "pages/lesMembres/add.php";
	}elseif($page==="gestion-membre"){
		
		require "pages/lesMembres/gestion.php";
	}elseif($page==="supprime-membre"){
		
		require "pages/lesMembres/del.php";
	}elseif($page==="profil-membre"){
		
		require "pages/lesMembres/profil_membre.php";
	}elseif($page==="apparence"){
		
		require "pages/apparence/apparence.php";

	}elseif($page==="contactez-nous"){
		
		require "pages/contactez-nous/contact.php";

	}elseif($page==="ajout-formation"){
		
		require "pages/formation/ajout_formation.php";

	}elseif($page==="gestion-formation"){
		
		require "pages/formation/gestion_formation.php";

	}elseif($page==="del-formation"){
		
		require "pages/formation/del_formation.php";

	}elseif($page==="description-formation"){
		
		require "pages/formation/description_formation.php";

	}elseif($page==="ajout-offres"){
		
		require "pages/offres/ajout_offre.php";

	}elseif($page==="gestion-offres"){
		
		require "pages/offres/gestion_offres.php";

	}elseif($page==="del-offres"){
		
		require "pages/offres/del_offre.php";

	}elseif($page==="edditer-offres"){
		
		require "pages/offres/edit.php";

	}elseif($page==="description-offre"){
		
		require "pages/offres/description.php";

	}elseif($page==="ajout-produits"){
		
		require "pages/produits/ajout_produit.php";

	}elseif($page==="gestion-produits"){
		
		require "pages/produits/gestion_produit.php";
	}elseif($page==="edditer-produits"){
		
		require "pages/produits/edit_produit.php";
	}elseif($page==="del-produits"){
		
		require "pages/produits/del_produit.php";
	}elseif($page==="detail-produits"){
		
		require "pages/produits/description_produits.php";
	}
	$contenu=ob_get_clean();

	require "template/default.php";

	// appelle de la page ajouter(add.php)





 ?>
 