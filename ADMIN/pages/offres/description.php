<?php 
	$db= new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	if (isset($_GET['offre']) && !empty($_GET['offre'])) {
		$reqoffre=$db->prepare("SELECT * FROM offres WHERE id_offre=?");
		$reqoffre->execute(array($_GET['offre']));
		$affichage=$reqoffre->fetch();
	}

 ?>
 <!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Offres</li>
           <li class="breadcrumb-item active">Descriptions</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header text-white" style="background: #12cccc;">
              DETAILLE SUR  NOS OFFRES</div><br>

           <div class="card-body">   
              
             
              <h2>Detail de l'offres <font color="#CC0000"><?= $affichage['titre']; ?></font></h2>
              <h3><u>Description du post</u></h3>
              <p><?= $affichage['description']; ?></p>
              <h3><u>Profil du poste</u></h3>
              <p><?= $affichage['profil_post']; ?></p>
              <h3><u>Dossier et Email du Candidature</u></h3>
              <p><?= $affichage['candidature']; ?></p>
              <a href="<?= $_SERVER['HTTP_REFERER']; ?>"><-Rétour Vers la page de gestion d'offre</a>


 			</div>