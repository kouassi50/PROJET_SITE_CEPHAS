<!-- Description produit -->
<?php 
	$db= new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	if (isset($_GET['produit']) && !empty($_GET['produit'])) {
		$reqproduit=$db->prepare("SELECT * FROM produits WHERE id_produit=?");
		$execution=$reqproduit->execute(array($_GET['produit']));
		$affichage=$reqproduit->fetch();
	}

 ?>
 <!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Produits</li>
           <li class="breadcrumb-item active">Descriptions</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header text-white" style="background: #12cccc;">
              DETAILLE SUR  NOS PRODUITS</div><br>

           <div class="card-body">   
              
             
              <h2>Detail de le produit <font color="#CC0000"><?= $affichage['libelle']; ?></font></h2>
              <div class="trai"></div>

              <h3><u>Description du produit</u></h3>
              <p><?= $affichage['detail_produits']; ?></p>
              <div>
              	<div class=""></div>

               <h3><u>Image du produit</u></h3>
              <img src="../ADMIN/pages/produits/imgsProduit/<?=$affichage['images'];?>" width=100 height=100>
              </div>
              <div class=""></div>
             
              <a href="<?= $_SERVER['HTTP_REFERER']; ?>"><-Rétour Vers la page de gestion des produits</a>


 			</div>