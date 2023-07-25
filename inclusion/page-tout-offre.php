<?php 

	setlocale(LC_TIME,'fr');
	$db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ));
	
	$reqoffre2=$db->query("SELECT * FROM offres ORDER BY titre");

    $offreinfo2=$reqoffre2->fetchAll();

    $compteStage=$db->query("SELECT count(id_offre) AS compter FROM offres WHERE categorie_id=2");
    $reponse=$compteStage->fetch();


?>

	 
		<div class="container text-center" style="margin-top: 30px;">
			<h2>
				<span class="badge badge-striped badge-pill badge-info" style="padding: 15px;">
					
					<span style="color: red;">
						<?php 
								$compteur=$db->query('SELECT count(id_categorie) AS nombreOffre FROM categorie_offres');
								$affiche=$compteur->fetchAll();
								foreach ($affiche as $affiches) {
									echo $affiches['nombreOffre'];
								}
						?>
					</span>
					
						OFFRES D'EMPLOI & DE STAGE DISPONIBLES <span class="text-danger">.</span>
				</span>
			</h2>

						<h4 style="margin-top: 25px;">
							
							<?php 

								$compteur=$db->query("SELECT count(id_offre) AS nombreEmploi FROM offres WHERE categorie_id=1");
								
								$affiche=$compteur->fetchAll();
								foreach ($affiche as $affiches) {
									echo $affiches['nombreEmploi'];
								
									
								}
							 ?>
							  Offres Emploi -
							  <?php
							  	$compteur=$db->query("SELECT count(id_offre) AS nombreStage FROM offres WHERE categorie_id=2");
								$affiche=$compteur->fetchAll();
								foreach ($affiche as $affiches) {
									echo $affiches['nombreStage'];
								} 
							   ?>
							    Offres Stage -
							    <?php
							  	$compteur=$db->query("SELECT count(id_offre) AS nombreInterim FROM offres WHERE categorie_id=3");
								$affiche=$compteur->fetchAll();
								foreach ($affiche as $affiches) {
									echo $affiches['nombreInterim'];
								} 
							   ?>
							    Offres Interim -
							     <?php
								  	$compteur=$db->query("SELECT count(id_offre) AS nombreFreelance FROM offres WHERE categorie_id=4");
									$affiche=$compteur->fetchAll();
									foreach ($affiche as $affiches) {
										echo $affiches['nombreFreelance'];
									} 
							   ?>
							    Offres Freelance -
							    <?php
								  	$compteur=$db->query("SELECT count(id_offre) AS nombreConsultant FROM offres WHERE categorie_id=5");
									$affiche=$compteur->fetchAll();
									foreach ($affiche as $affiches) {
										echo $affiches['nombreConsultant'];
									} 
							   ?>
							    Offres Consultant
							 	
							]
						</h4>
		</div>
		<div class="row" style="padding: 5px;">
			<div class="col-lg-8" style="">
				<?php foreach ($offreinfo2 as $tout_offre) {
				?>

				
					
						<div class="row blokc1" style="padding: 15px 0 5px 30px;background: #e6e9f0;">
							<h1 class="text-center"></h1>
							
							<div class="col-lg-2">	
								<h2><img src="ADMIN/pages/offres/imageoffre/<?=  $tout_offre['logo'] ?>"  style="height:75px;margin: 50px 20px 0 20px;" class="img img-thumbnail"></h2>
							</div>
							<div class="col-lg-8">
								<div class="ici" style="margin-left: 100px;padding: 15px;">
									<h3><i>Localité: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['lieu'] ?></span></h3>
									<h3><i>Niveux d'études: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['niveaux'] ?></span></h3>
									<h3><i>Expériences: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['experiences'] ?></span></h3>
									<h3><i>Domaines: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['metiers'] ?></span></h3>
									<h3><i>D'escription: </i><a href="detail-tout-offres.php" class="btn btn-warning">	Voir plus</a></h3>
								</div>
							</div>
							<div class="col-lg-2" style="padding: 5px;">
								<span class="badge badge-info" style="padding: 10px;float: right;font-size: 18px;">
									<?= $tout_offre['titre']?>
								</span>
							</div>
							<div class="text-center bg-dark" style="margin-left: 25px;padding: 4px;">
								<h3 style="font-size: 22px;color: #fff;"><i class="fas fa-plus" style="margin-right: 5px; font-size: 22px;color: #fff;"> Date d'édition: </i><span style="color: orange;margin-right: 10px;"> <?= $tout_offre['date_pub'] ?> </span><i class="fas fa-plus" style="margin-right: 5px; font-size: 15px;"> Date limite: </i><span style="color: orange;margin-right: 10px;"> <?= $tout_offre['date_exp'] ?> </span><i class="fas fa-plus" style="margin-right: 5px; font-size: 22px;color: #fff;"> icone </i><span style="color: orange;margin-right: 10px;">Côte d'Ivoire </span></h3>
							</div>
						</div>
						<?php } ?>
					</div>
						
			
					<div class="col-lg-4" style="background: #e6e9f0;padding-top: 40px;">
						<div class="card" width=300>
							<div class="card-header">
									<p>1er img</p>
									
							</div>
							<img src="public/img/pa.jpg">
							<div class="card-body">
								<i>jejejejejejejejejejejejejejejej</i>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<p>2e img</p>
							</div>
							<img src="public/img/ny.jpg">
							<div class="card-body">
								<p>2bbbbbbbbbbbbbbbbbbbbbbbbbbbbe img</p>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<p>2e img</p>
							</div>
							<img src="public/img/logo-stand.png">
							<div class="card-body">
								<p>2bbbbbbbbbbbbbbbbbbbbbbbbbbbbe img</p>
							</div>
						</div>
					</div>		
				
<!-- fin -->