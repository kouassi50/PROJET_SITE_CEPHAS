
<?php 
  $db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if (isset($_POST['envoi'])) {
  
  $date_fab=$_POST['date_fab'];
  $date_exp=$_POST['date_exp'];
  $libelle=htmlspecialchars($_POST['libelle']);
  $detail_produit=htmlspecialchars($_POST['detail']);
  $type_produit=$_POST['type'];
  $prix_produit=htmlspecialchars($_POST['prix']);
  
  $tmp_name=$_FILES['img']['tmp_name'];
  $nom_image=$_FILES['img']['name'];
  $taille=$_FILES['img']['size'];
  $type=basename($_FILES['img']['type']);


  if ($taille<2097152) {

        $extensionvalide=array('png','jpeg','jpg');
        if (in_array($type,$extensionvalide)) {

          $chemin="../ADMIN/pages/produits/imgsProduit/".$nom_image;
          if (is_uploaded_file($tmp_name)) {

            move_uploaded_file($tmp_name,"$chemin");
   
          }
          
        }else{
          $erreur= "le fichier doit etre de format:'png','jpeg','jpg'";
        }
      
    }else{
        $erreur= "la taille maximale doit etre de 2 Mo ";

      }



      if (isset($date_fab) AND isset($date_exp) AND isset($libelle) AND isset($type_produit) AND isset($prix_produit,$detail_produit)) {
        
        $inserer = $db->prepare("INSERT INTO produits SET libelle=?, prix=?, date_fab=?, date_exp=?, details=?, image=?, type_id=?");
        $execution=$inserer->execute(array($libelle,$prix_produit, $date_fab, $date_exp,$detail_produit,$nom_image,$type_produit));


        $succes = "Votre produit a bien été enregistrée |  <a href='?identiUser=$_SESSION[idUser]&p=gestion-produits'>Gestion</a>";

      }

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
        <div class="card-header text-white" style="background: #5b1102;">
              AJOUT DES PRODUITS</div><br>

 
          <div class="card-body">
              
              <?php
                if (isset($succes)) {
                  
                  ?>
                <div class="container">
                     <div class="alert alert-success text-center" style="font-weight: bold;">
                       <?= $succes; ?>
                     </div>
                </div>
                  <?php
                }   
              ?>


<form method="POST" class="horizontal" enctype="multipart/form-data">
              <div class="form-group">
                 <div class="row">
                 <label class="col-sm-3 control-label">Date de fabrication:</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="date_fab" value="" required>
                  </div>
                  </div>
                  
                  
              </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Date d'expiration:</label>
                  <div class="col-sm-8">
                    <input type="date" name="date_exp" class="form-control" value="" required>
                  </div>
                  </div>
                  
                  
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Libéllé du produit:</label>
                  <div class="col-sm-8"><input type="text" name="libelle" class="form-control" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Le type de produit:</label>
                  <div class="col-sm-8">
                    <select name="type" class="form-control" required>
                      <option value="1">Cosmétique</option>
                      <option value="2">Alimentaire</option>
                    </select>
                  </div>
                  </div>  
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Prix du produit:</label>
                  <div class="col-sm-8"><input type="text" name="prix" class="form-control" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Details sur le produit:</label>
                  <div class="col-sm-8">
                    <textarea name="detail" class="form-control" required></textarea>
                  </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Image du produit:</label>
                  <div class="col-sm-8">
                    <input type="file" name="img" required>
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