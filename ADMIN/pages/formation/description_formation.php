
<h1>description de formation</h1>
<?php 
	$db= new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
  
	if (isset($_GET['formation']) && !empty($_GET['formation'])) {
		$reqoffre=$db->prepare("SELECT * FROM formations WHERE id_formation=?");
		$reqoffre->execute(array($_GET['formation']));
		$affichage=$reqoffre->fetch();
	}

 ?>
 
 <!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Formations</li>
           <li class="breadcrumb-item active">Descriptions</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header text-white" style="background: #999;">
              DETAILLE DE LA FORMATION</div><br>

           <div class="card-body">   
 
              <h2 class="text-center" style="margin-bottom: 15px">Detail de la formation <font color="#CC0000"><?= $affichage['titre']; ?></font></h2>
              <h3><u>Description de la formations</u></h3>
              <p><?= $affichage['description']; ?></p>
              <h3><u>Contenu de la formation</u></h3>
              <p><?= $affichage['contenu']; ?></p>
              <h3><u>Les cibles</u></h3>
              <p><?= $affichage['cible']; ?></p>
              <h3><u>Objectif de la formation</u></h3>
              <p><?= $affichage['objectif']; ?></p>
              <a href="<?= $_SERVER['HTTP_REFERER']; ?>"><-Rétour Vers la page de gestion des formations</a>
 			</div>