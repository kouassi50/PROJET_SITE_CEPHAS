<?php 
   $db= new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

  //  $reqformation=$db->query("SELECT * FROM formations ORDER BY  date_pub DESC");
  //  $reqformation->fetchALL();
  // setlocale(LC_TIME, 'fr');

   $reqformation=$db->query("SELECT * FROM formations ORDER BY  date_pub DESC");
  $aff=$reqformation->fetchALL();
  setlocale(LC_TIME, 'fr');

if (isset($_GET['pub']) && $_GET['pub']>0 && !empty($_GET['pub'])) {
  $pub=intval($_GET['pub']);
  $req=$db->prepare("UPDATE formations SET etat=1 WHERE id_formation=?");
  $req->execute(array($pub));
}




 ?>
<!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Formations</li>
           <li class="breadcrumb-item active">Gestions</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header text-white" style="background: #a40183;">
              GESTION DES FORMATIONS</div><br>
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
                <a href="?identiUser=<?=$_SESSION['idUser']?>&p=ajout-formation" class="btn btn-success" style="margin-bottom: 15px;"><i class="fas far-fw fa-plus-circle"></i>Ajouter</a>
               
             </div>


              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th>Action</th>
                      <th>Date de publication</th>
                      <th>Date d'expiration</th>
                      <th>Titre de la formation</th>
                      <th>Contenu de la formation</th>
                      <th>Cibles de la formation</th>
                      <th>Début de la formation</th>
                      <th>Durée de la formation</th>
                      <th>Lieu de la formation</th>
                      <th>Objectifs de la formation</th> 
                      <th>Tarifs  de la formation</th>
                      <th>Details du formation</th>
                      <th>Images</th>
                      <th>Etat</th>

                    </tr>
                  </thead>
                    
                  <tbody>
                    <?php 
                    
                    foreach ($aff as $affichage){?>
                      <tr>
                       <td><a href="?identiUser=<?=$_SESSION['idUser'];?>&p=del-formation&sup=<?=$affichage['id_formation'];?>"><button class="btn btn-danger" onclick="return(confirm('voulez-vous vraiment supprimer la formation <?=$affichage['titre']?>?'));"><i class="fas far-fw fa-trash-alt"></i></button></a></td>

                       
                        <td><?=strftime('%a-%d-%b-%Y',strtotime($affichage['date_pub']))?></td>
                        <td><?=strftime('%a-%d-%b-%Y',strtotime($affichage['date_exp']))?></td>
                        <td><?=$affichage['titre']?></td>
                        <td><?=$affichage['contenu']?></td>
                        <td><?=$affichage['cible']?></td>
                        <td><?=$affichage['debut']?></td>
                        <td><?=$affichage['duree']?></td>
                        <td><?=$affichage['lieu']?></td>
                        <td><?=$affichage['objectif']?></td>
                        <td><?=$affichage['tarif']?></td>
                      
                        <td><?=substr($affichage['description'], 0 , 10)?>...<a href="?identiUser=<?=$_SESSION['idUser'];?>&p=description-formation&formation=<?=$affichage['id_formation'];?>">Voir suite</a></td>
                        <td>
                          <img src="../ADMIN/pages/formation/imageformation/<?=$affichage['image'];?>" width=50 height=50 href="ok">
                        </td>
                      
                        <td>
                          <?php $today=date('Y-m-d');

                           if ($affichage['etat']==0) { ?>

                                <a href="?identiUser=<?=$_SESSION['idUser'];?>&p=gestion-formation&pub=<?=$affichage['id_formation'];?>" class="btn btn-warning">Publier</a>

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
