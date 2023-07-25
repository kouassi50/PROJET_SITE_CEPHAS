
<?php 
  $db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

if (isset($_GET['modif'])) {
	 	$modif=intval($_GET['modif']);

	 	$reqproduit=$db->prepare("SELECT * FROM produit WHERE id_produit=?");
	 	$reqproduit->execute(array($modif));
	 	$produitinfo=$reqproduit->fetch();


	  $reqprodtype=$db->query("SELECT * FROM  type_produit");
	 $affichetype=$reqprodtype->fetchAll();
}

if (isset($_POST['envoi'])) {

	$date_fab=$_POST['date_fab'];
	$date_exp=$_POST['date_exp'];
	$type_produit=$_POST['type'];
	$prix_produit=htmlspecialchars($_POST['prix']);
	$detail_produit=htmlspecialchars($_POST['detail']);
	$libelle_produit=htmlspecialchars($_POST['libelle']);


	$tmp_name=$_FILES['img']['tmp_name'];
    $nom_image=$_FILES['img']['name'];
    $taille=$_FILES['img']['size'];
    $type=basename($_FILES['img']['type']);


    if ($taille<2097152) {
    	$extentionValide=array('png','jpeg','jpg');
    	if (in_array($type, $extentionValide)) {
    		$chemain="../ADMIN/pages/produits/imgsProduit/".$nom_image;
    		if (is_uploaded_file($tmp_name)) {
    			move_uploaded_file($tmp_name, $nom_image);
    		}
    	}else{
    		$erreur="L'image doit être de format:'png','jpeg','jpg'";
    	}

    }else{
    	$erreur="Désolé! la taille de cette image doit être de 2 Mo...";
    }
    // Les conditions sur les modifications(éddité)

    if ((isset($date_fab) AND !empty($date_fab)) AND $date_fab!=$produitinfo['date_fab']) {
    	$modifproduit=$db->prepare("UPDATE produits SET date_fab=?  WHERE id_produit=?");
    	$modifproduit->execute(array($date_fab,$modif));	
    }
    
    if ((isset($date_exp) AND !empty($date_exp)) AND $date_exp!=$produitinfo['date_exp']) {
    	$modifproduit=$db->prepare("UPDATE produits SET date_exp=? WHERE id_produit=?");
    	$modifproduit->execute(array($date_exp,$modif));	
    }

    if ((isset($libelle_produit) AND !empty($libelle_produit)) AND $libelle_produit!=$produitinfo['libelle']) {
    	$modifproduit=$db->prepare("UPDATE produits SET libelle=? WHERE id_produit=?");
    	$modifproduit->execute(array($libelle_produit,$modif));	
    }

    if ((isset($type_produit) AND !empty($type_produit)) AND $type_produit!=$produitinfo['type_id']) {
    	$modifproduit=$db->prepare("UPDATE produits SET type_id=? WHERE id_produit=?");
    	$modifproduit->execute(array($type_produit,$modif)); 	
    }

    if ((isset($prix_produit) AND !empty($prix_produit)) AND $prix_produit!=$produitinfo['prix_produit']) {
    	$modifproduit=$db->prepare("UPDATE produits SET prix_produit=? WHERE id_produit=?");
    	$modifproduit->execute(array($prix_produit,$modif));	
    }

    if ((isset($detail_produit) AND !empty($detail_produit)) AND $detail_produit!=$produitinfo['detail_produits']) {
    	$modifproduit=$db->prepare("UPDATE produits SET detail_produits=? WHERE id_produit=?");
    	$modifproduit->execute(array($detail_produit,$modif));	
    }

    if ($modif) {
    	$_SESSION['msgError']="Votre modification a bien été prise en compte : )";
    	header('location: '.$_SERVER['HTTP_REFERER']);
    }
    // Fin des conditions pour éddité

}

    



 ?>
 <!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Produits</li>
           <li class="breadcrumb-item active">Ajouts</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header text-white" style="background: #16ecbc;">
              AJOUT DES PRODUITS</div><br>

 
 <div class="card-body">
	<form method="POST" class="horizontal" enctype="multipart/form-data">
              <div class="form-group">
                 <div class="row">
                 <label class="col-sm-3 control-label">Date de fabrication:</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="date_fab" value="<?= $produitinfo['date_fab']?>">
                  </div>
                  </div>
                  
                  
              </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Date d'expiration:</label>
                  <div class="col-sm-8">
                    <input type="date" name="date_exp" class="form-control" value="<?= $produitinfo['date_exp'];?>">
                  </div>
                  </div>
                  
                  
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Libéllé du produit:</label>
                  <div class="col-sm-8"><input type="text" name="libelle" class="form-control" value="<?= $produitinfo['libelle'];?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Le type de produit:</label>
                  <div class="col-sm-8">
                    <select name="type" class="form-control">

                    <?php foreach ($affichetype as $affiche){ ?>

                    	<?php $attribut='' ?>

                    	<?php if ($affiche['id_type']==$produitinfo['type_id']) { ?>
                    	<?php $attribut='selected' ?>
                    	<?php
                    				
              			}?>
                    	 		<option value="<?= $affiche['id_type'] ?>" <?= $attribut ?> > <?= $affiche['libelle_type'] ?></option>

                    		 	
                     <?php } ?>
                    </select>
                  </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Prix du produit:</label>
                  <div class="col-sm-8"><input type="text" name="prix" class="form-control" value="<?= $produitinfo['prix_produit'];?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Details sur le produit:</label>
                  <div class="col-sm-8">
                    <textarea name="detail" class="form-control" value=""><?= $produitinfo['detail_produits'];?></textarea>
                  </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Image du produit:</label>
                  <div class="col-sm-8">
                    <input type="file" name="img" disabled>
                  </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   
                  <div class="col-sm-8">
                    <label class="col-sm-3 control-label"></label>
                    <button type="submit" class="btn btn-success" name="envoi">Enregistrer</button>
                  </div>
                  </div>
                </div>
    
              </form>
              
            </div>
            
        </div>
    </div>