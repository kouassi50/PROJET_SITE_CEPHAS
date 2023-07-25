<?php 
  $db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
  
if (isset($_POST['envoi'])) {
  
  $date_exp=$_POST['date_exp'];
  $titre=htmlspecialchars($_POST['titre']);
  $contenu=htmlspecialchars($_POST['contenu']);
  $cible=htmlspecialchars($_POST['cible']);
  $duree=$_POST['duree'];
  $objectif=$_POST['objectif'];
  $debut=$_POST['debut'];
  $lieu=htmlspecialchars($_POST['lieu']);
  $tarif=$_POST['tarif'];
  $description=$_POST['description'];

  $tmp_name=$_FILES['image']['tmp_name'];
  $nom_image=$_FILES['image']['name'];
  $taille=$_FILES['image']['size'];
  $type=basename($_FILES['image']['type']);


  if ($taille<2097152) {

        $extensionvalide=array('png','jpeg','jpg');
        if (in_array($type,$extensionvalide)) {

          $chemin="../ADMIN/pages/formation/imageformation/".$nom_image;
          if (is_uploaded_file($tmp_name)) {

            move_uploaded_file($tmp_name,$chemin);


             
          }
          
        }else{
          $erreur= "Le fichier doit être de format:'png','jpeg','jpg'";
        }
      
  }else{
        $erreur= "La taille maximale doit être de 2 Mo ";

      }



      if ( isset($date_exp) AND isset($titre) AND isset($contenu) AND isset($cible) AND isset($duree) AND isset($objectif) AND isset($debut) AND isset($lieu)  AND isset($tarif) AND isset($description)) {
        
        $inserer = $db->prepare("INSERT INTO formations SET titre=?,contenu=?,cible=?,duree=?,objectif=?,debut=?,lieu=?,tarif=?,date_pub=NOW(),date_exp=?,description=?,image=?");

        $inserer->execute(array($titre,$contenu,$cible,$duree,$objectif,$debut,$lieu,$tarif,$date_exp, $description,$nom_image));


        $succes = "Votre formation à bien été enregistrée |  <a href='?identiUser=$_SESSION[idUser]&p=gestion-formation'>Gestion</a>";



      }

}
 ?>
<!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Formations</li>
           <li class="breadcrumb-item active">Ajouts</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header text-white" style="background: #5b022c;">
              AJOUT DES FORMATIONS</div><br>
<div class="card-body">
   <?php
      if (isset($erreur)) {
                  
        ?>
          <div class="container">
              <div class="alert alert-danger text-center" style="font-weight: bold;">
                  <?= $erreur; ?>
              </div>
          </div>
        <?php
                }   
        ?>
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
                 <label class="col-sm-3 control-label">Date de publication:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" disabled value="<?php echo date('d/m/Y');?>">
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
                   <label class="col-sm-3 control-label">titre de la formation:</label>
                  <div class="col-sm-8"><input type="text" name="titre" class="form-control" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Contenu de la formation:</label>
                  <div class="col-sm-8"><input type="text" name="contenu" class="form-control" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Cible de la formation:</label>
                  <div class="col-sm-8"><input type="text" name="cible" class="form-control" value="" required>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Durée de la formation:</label>
                  <div class="col-sm-8"><input type="text" name="duree" class="form-control" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Objectifs de la formation:</label>
                  <div class="col-sm-8"><input type="text" name="objectif" class="form-control" value="" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Début de la formation:</label>
                  <div class="col-sm-8"><input type="text" name="debut" class="form-control" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Lieu de la formation:</label>
                  <div class="col-sm-8"><input type="text" name="lieu" class="form-control" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Tarif de la formation:</label>
                  <div class="col-sm-8"><input type="text" name="tarif" class="form-control" value="" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Description:</label>
                  <div class="col-sm-8">
                    <textarea name="description" class="form-control" required></textarea>
                  </div>
                  </div>
                </div>

                
                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Image:</label>
                  <div class="col-sm-8">
                    <input type="file" name="image" required>
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