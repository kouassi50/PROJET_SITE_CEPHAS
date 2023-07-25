
<?php
   
   $db= new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

   $reqproduit=$db->query("SELECT id_produit, libelle, etat,  prix_produit, date_fab, date_exp, detail_produits, images, type_id, id_type, libelle_type FROM produit, type_produit 
    WHERE  id_type = type_id 
    ORDER BY  date_fab DESC");
   $produitinfo=$reqproduit->fetchAll();
setlocale(LC_TIME, 'fr');

if (isset($_GET['pub']) && $_GET['pub']>0 && !empty($_GET['pub'])) {
  $pub=intval($_GET['pub']);
  $req=$db->prepare("UPDATE produit SET etat=1 WHERE id_produit=?");
  $req->execute(array($pub));
}


?>
<!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Produits</li>
           <li class="breadcrumb-item active">Gestions</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header text-white" style="background: #e9ec16;">
              GESTION DES PRODUITS</div><br>
   
      <div class="card-body">

        <?php if (isset($_SESSION['msgError'])) { ?>
                    
              <div class="container">
                <div class="alert alert-success text-center font-weight-bold">
                  <?php echo $_SESSION['msgError'];?> <!-- veut dire afficher message d'erreur. -->
                    <?php unset($_SESSION['msgError']);?> <!-- veut dire ne pas afficher message d'erreur. -->
                </div>
              </div>

             <?php } ?>

             <div class="row">
                <a href="?identiUser=<?=$_SESSION['idUser']?>&p=ajout-produits" class="btn btn-success"><i class="fas far-fw fa-plus-circle"></i>Ajouter</a>
               
             </div>


              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th colspan=2>Action</th>
                      <th>Date de fabrication</th>
                      <th>Date d'expiration</th>
                      <th>Libéllé</th>
                      <th>Prix</th>
                      <th>Details des produits</th>
                      <th>Images</th>
                      <th>Type de produits</th> 
                      <th>Etat</th>
                    </tr>
                  </thead>
                    
                  <tbody>
                    <?php foreach ($produitinfo as $affichage){?>
                      <tr>
                       <td><a href="?identiUser=<?=$_SESSION['idUser'];?>&p=del-produits&sup=<?=$affichage['id_produit'];?>"><button class="btn btn-danger" onclick="return(confirm('voulez-vous vraiment supprimer le produit <?=$affichage['libelle']?>?'));"><i class="fas far-fw fa-trash-alt"></i></button></a></td>
                       <td><a href="?identiUser=<?=$_SESSION['idUser'];?>&p=edditer-produits&modif=<?=$affichage['id_produit'];?>" rel="Modification" class="btn btn-primary"><i class="fa fa-pen fa-white"></i></a></td>
                        <td><?=strftime('%a-%d-%b-%Y',strtotime($affichage['date_fab']))?></td>
                        <td><?=strftime('%a-%d-%b-%Y',strtotime($affichage['date_exp']))?></td>
                        <td><?=$affichage['libelle']?></td>
                        <td><?=$affichage['prix_produit']?></td>
                        <td><?=substr($affichage['detail_produits'], 0 , 10)?>...<a href="?identiUser=<?=$_SESSION['idUser'];?>&p=detail-produits&produit=<?=$affichage['id_produit'];?>">Voir sute</a></td>
                        <td>
                          <img src="../ADMIN/pages/produits/imgsProduit/<?=$affichage['images'];?>" width=50 height=50>
                        </td>
                        <td><?=$affichage['libelle_type']?></td>
                       
                        
                        
                        <td>
                          
                            <?php $today=date('Y-m-d');

                           if ($affichage['etat']==0) { ?>

                                <a href="?identiUser=<?=$_SESSION['idUser'];?>&p=gestion-produits&pub=<?=$affichage['id_produit'];?>" class="btn btn-warning">Publier</a>

                          <?php } if ($affichage['etat']==1 && $affichage['date_exp']>=$today) { ?>

                                   <font color=#00C851>En ligne</font> 

                          <?php } if ($affichage['etat']==1 && $affichage['date_exp']<$today) { ?>
                                  
                                   <font color=#CC0000>Expiréé</font>

                          <?php } ?>
                          </td>
                      </tr>
                   <?php }?>
                   
                  </tbody>
                </table>
              </div>
            </div>
       </div>

