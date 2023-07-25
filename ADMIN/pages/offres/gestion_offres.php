<?php
   
   $db= new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

   $reqoffre=$db->query("SELECT id_offre, offres.titre, categorie_offres.titre as type, pseudo, description, metiers, niveaux, experiences, lieu, logo, date_pub, date_exp, categorie_id, mem_id, offres.etat as etat
    FROM offres, categorie_offres, membres
    WHERE  id_categorie = categorie_id
    AND id_mem = mem_id
    ORDER BY  date_pub DESC");
   $offreinfo=$reqoffre->fetchALL();
setlocale(LC_TIME, 'fr');

if (isset($_GET['pub']) && $_GET['pub']>0 && !empty($_GET['pub'])) {
  $pub=intval($_GET['pub']);
  $req=$db->prepare("UPDATE offres SET etat=1 WHERE id_offre=?");
  $req->execute(array($pub));
}


?>
   


<ol class="breadcrumb">
    <li class="breadcrumb-item">
         <a href="#">tableau de board</a>
      </li>
    <li class="breadcrumb-item">offres</li>
    <li class="breadcrumb-item active">gestion</li>
</ol>

 <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header bg-dark text-white">
              
              GESTION DES MEMBRES</div>
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
                <a href="?identiUser=<?=$_SESSION['idUser']?>&p=ajout-offres" class="btn btn-success"><i class="fas far-fw fa-plus-circle"></i>Ajouter</a>
               
             </div>


              <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th colspan=2>Action</th>
                      <th>Date de publication</th>
                      <th>Date d'expiration</th>
                      <th>Titre de l'offre</th>
                      <th>Type de l'offre</th>
                      <th>Metiers</th>
                      <th>Niveaux</th>
                      <th>Expériences</th> 
                      <th>Lieu</th>
                      <th>Details du poste</th>
                      <th>Logo</th>
                      <th>Publicateur</th>
                      <th>Etat</th>

                    </tr>
                  </thead>
                    
                  <tbody>
                    <?php foreach ($offreinfo as $affichage){?>
                      <tr>
                       <td><a href="?identiUser=<?=$_SESSION['idUser'];?>&p=del-offres&sup=<?=$affichage['id_offre'];?>"><button class="btn btn-danger" onclick="return(confirm('voulez-vous vraiment supprimer l\'offre <?=$affichage['titre']?>?'));"><i class="fas far-fw fa-trash-alt"></i></button></a></td>
                       <td><a href="?identiUser=<?=$_SESSION['idUser'];?>&p=edditer-offres&modif=<?=$affichage['id_offre'];?>" rel="Modification" class="btn btn-primary"><i class="fa fa-pen fa-white"></i></a></td>
                        <td><?=strftime('%a-%d-%b-%Y',strtotime($affichage['date_pub']))?></td>
                        <td><?=strftime('%a-%d-%b-%Y',strtotime($affichage['date_exp']))?></td>
                        <td><?=$affichage['titre']?></td>
                        <td><?=$affichage['type']?></td>
                        <td><?=$affichage['metiers']?></td>
                        <td><?=$affichage['niveaux']?></td>
                        <td><?=$affichage['experiences']?></td>
                        <td><?=$affichage['lieu']?></td>
                        <td><?=substr($affichage['description'], 0 , 15)?>...<a href="?identiUser=<?=$_SESSION['idUser'];?>&p=description-offre&offre=<?=$affichage['id_offre'];?>">Voir sute</a></td>
                        <td>
                          <img src="../ADMIN/pages/offres/imageoffre/<?=$affichage['logo'];?>" width=50 height=50>
                        </td>
                        <td><?=$affichage['pseudo']?></td>
                        <td>
                          <?php $today=date('Y-m-d');

                           if ($affichage['etat']==0) { ?>

                                <a href="?identiUser=<?=$_SESSION['idUser'];?>&p=gestion-offres&pub=<?=$affichage['id_offre'];?>" class="btn btn-warning">Publier</a>

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

