
<?php
setlocale(LC_TIME, 'fr');

 $bd = new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
 	$reqUser=$bd->query("SELECT * FROM membres ORDER BY date_ins DESC");
	$userinfo=$reqUser->fetchAll(); 

 ?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Tableau De Bord</a>
    </li>
    <li class="breadcrumb-item">Membre</li>
        <li class="breadcrumb-item active">Gestions</li>
</ol>
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header text-white" style="background: #c50d1e;">GESTION DES MEMBRES</div>
        <div class="card-body">
            <?php
                        if (isset($_SESSION['msgError'])) {
                          
                            ?>
                                <div class="container">
                                     <div class="alert alert-success text-center" style="font-weight: bold;">
                                       <?= $_SESSION['msgError']; ?>
                                       <?php unset($_SESSION['msgError']); ?>
                                     </div>
                                </div>
                            <?php
                        }   
                 ?>
    <div class="row">
      <a href="?identiUser=<?=$_SESSION['idUser'];?>&p=ajout-membre" class="btn btn-success" style="margin: 15px;"><span class="fa fa-plus-circle"></span> Ajouter</a>
    </div>
            <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>

                    <tr ><th width="100%" colspan="10">1111111111111</th></tr>
                      <th>Actions</th>
                      <th>Date d'inscription</th>
                      <th>Noms</th>
                      <th>Prénoms</th>
                      <th>Pseudos</th>
                      <th>E-mails</th>
                      <th>Statuts</th>
                      <th>Appartenances</th>
                    </tr>
                  </thead>
       
                <tbody>
                    <?php
                    	foreach ($userinfo as $affichage) {
                    		?>
                    			<tr>
                    				<td>
                    					<a href="?identiUser=<?= $_SESSION['idUser'];?>&p=supprime-membre&sup=<?= $affichage['id_mem'];?>">
	                    					<button class="btn btn-danger btn-lg" onclick="return(confirm('Voulez-vous vraiment supprimer <?= '<<'. $affichage['pseudo'] .'>>';?>?'))">
	                    						<i class="fas fa-bell fa-trash-alt"></i>
	                    					</button>
                    					</a>
                    				</td>
                    				<td>
                    					<?= strftime('%A %d %B %Y | %H:%M:%S',strtotime($affichage['date_ins']))?>
                    				</td>
                    				<td>
                    					<?= $affichage['nom'];?>
                    				</td>
                    				<td>
                    					<?= $affichage['prenoms'];?>
                    				</td>
                    				<td>
                    					<?= $affichage['pseudo'];?>
                    				</td>
                    				
                    				<td>
                    					<?= $affichage['email'];?>
                    				</td>
                    				
                    				<td>
                    					<?= $affichage['statut'];?>
                    				</td>
                    				<td>
                    					<?= $affichage['apparence'];?>
                    				</td>
                    			</tr>
                    		<?php
                    	}
                    	 


                     ?>
            </tbody>
        </table>
    </div>
</div>