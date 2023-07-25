<?php 

	setlocale(LC_TIME,'fr');
	$db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ));
	
	$reqFormation=$db->query("SELECT * FROM formations ORDER BY titre");

    $formationInfo=$reqFormation->fetchAll();

 
?>
 <style type="text/css">
 	.block-general{
 		padding: 10px 0 15px 0;
		margin-top: 15px;
		background: #fff;
 	}
 	.sect-1{
		padding: 5px 20px 10px 10px;
		background: #e6e9f0;
		margin: 13px 5px 5px 10px;
	}
	.ici{
		margin-left: 100px;
		padding: 15px;
	}
	#block-encouragement{
		
		background-image: url('ADMIN/pages/offres/imageoffre/logo3.jpg');
		background-position: 100%;
		position: relative;
		background-size: cover;
		background-repeat: no-repeat;
		text-align: center;
		margin-top: 30px;
		padding: 20px 0;
	}
	#block-encouragement h1{
		margin-top: 25px;
		color: #22a;
		text-align: center;
		font-weight: bold;text-transform: uppercase;
		
	}
	#block-encouragement a{
		color: orange;
		font-size: 25px;
		text-decoration: none;
		margin: 15px 0 20px 0;
	}
	#block-encouragement a:hover{
		color: #fff;
	}
	.lesBlock h2{
		font-weight: bold;
		text-align: center;
		text-transform: uppercase;
		border: 1px solid red;
		color: red;
		padding: 3px;
		margin: 20px 2px 15px 5px;


	}
	.lesBlock{
		background: yellow;
		padding: 10px;
		width: 460px;
		margin: 10px 2px 10px 5px;
	}
	.lesBlock a img{
		width: 80px;
	}
	.lesBlock a img:hover{
		width: 108px;
		transition: all 2s ease-in 0s;
	}
	
 </style>
		<div class="container text-center" style="margin-top: 30px;">
			<h2>
				<span class="badge badge-striped badge-pill badge-info" style="padding: 15px;">
					
					<span style="color: red;">
						<?php 
								$compteur=$db->query('SELECT count(id_formation) AS nombreFormation FROM formations');
								$affiche=$compteur->fetchAll();
								foreach ($affiche as $affiches) {
									echo $affiches['nombreFormation'];
								}
						?>
					</span>
					
						NOS FORMATIONS DISPONIBLE <span class="text-danger">.</span>
				</span>
			</h2>
		</div>

		<div class="row block-general">
			<div class="col-lg-8 ">
				<?php foreach ($formationInfo as $tout_offre) {
					?>
					
						<div class="row sect-1">
							<h1 class="text-center"></h1>
							
							<div class="col-lg-2">
								<h2><img src="ADMIN/pages/formation/imageformation/<?=  $tout_offre['image'] ?>"  style="height:75px;margin: 50px 20px 0 20px;" class=""></h2>
							</div>
							<div class="col-lg-8">
							<div class="ici">
								<h3><i>Lieu de la formation: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['lieu'] ?></span></h3>
								<h3><i>Durée de la formation: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['duree'] ?></span></h3>
								<h3><i>Cibles: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['cible'] ?></span></h3>
								<h3><i>Tarifs: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['tarif'] ?></span></h3>
								<h3><i>Domaines: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['titre'] ?></span></h3>
								<h3><i>Début de la formation: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['debut'] ?></span></h3>
								<h3><i>Contenu de la formation: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['contenu'] ?></span></h3>
								<h3><i>Objectif de la formation: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['objectif'] ?></span></h3>
								<h3><i>D'escription: </i><a href="details-formation.php" class="btn btn-warning"><i class="fas fa-eye"> </i>	Voir plus</a></h3>
							</div>
							</div>
							<div class="col-lg-2">
								<span class="badge badge-info" style="padding: 10px;font-size: 18px;float: right;margin-top: 10px;">
									<?= $tout_offre['titre']?>
								</span>
							</div>
							<div class="text-center bg-dark" style="margin-left: 25px;padding: 4px;margin-top: 5px;">
								<h3 style="font-size: 22px;"><i class="fas fa-plus-circle" style="margin-right: 5px; font-size: 22px;color: #fff;"> Date d'édition: </i><span style="color: orange;margin-right: 10px;"> <?= $tout_offre['date_pub'] ?> </span><i class="fas fa-plus-circle" style="margin-right: 5px; font-size: 22px;color: #fff;"> Date limite: </i><span style="color: orange;margin-right: 10px;"> <?= $tout_offre['date_exp'] ?> </span><i class="fas fa-plus-circle" style="margin-right: 5px; font-size: 22px;color: #fff;"> icone </i><span style="color: orange;margin-right: 10px;">Côte d'Ivoire </span></h3>
							</div>
						</div>
						<?php } ?>
					</div>
						
			
					<div class="col-lg-4" style="background: #fff;padding-top: 15px;">
						<div class="card" style="width: 460px;">
							<div class="card-header">
									<p>1er img</p>
									
							</div>
							<img src="public/img/pa.jpg">
							<div class="card-body">
								<i>jejejejejejejejejejejejejejejej</i>
							</div>
						</div>
						<div class="card" style="width: 460px;">
							<div class="card-header">
								<p>2e img</p>
							</div>
							<img src="public/img/ny.jpg">
							<div class="card-body">
								<p>2bbbbbbbbbbbbbbbbbbbbbbbbbbbbe img</p>
							</div>
						</div>
						<div class="card" style="width: 460px;">
							<div class="card-header">
								<p>2e img</p>
							</div>
							<img src="public/img/logo-stand.png">
							<div class="card-body">
								<p>2bbbbbbbbbbbbbbbbbbbbbbbbbbbbe img</p>
							</div>
						</div>

						<!-- Les paragraphes -->
						<div class="row lesBlock">
							<div class="col-md-12">
								<h2 class="text-center">nos future modul</h2>
							</div>

							
							<!-- 1er block -->
							<div class="col-md-12">
								<h4>une formartion en hacking</h4>
							</div>
							<div class="col-md-4">
								<a href="#"><img src="ADMIN/pages/formation/imageformation/elcodeur.jpg" width="" class="img-thumbnail"></a>
							</div>
							<div class="col-md-8">
								<p>Lors du lancement de cette formation,une séance de prise en main séra à la porté de tous.</p>
								<i><mark>Date 03/03/2021 à Abidjan.</mark></i>
							</div>

							<!-- 2em block -->
							<div class="col-md-12">
								<h4>une formartion en infographie avancé</h4>
							</div>
							<div class="col-md-4">
								<a href="#"><img src="ADMIN/pages/formation/imageformation/elcodeur.jpg" width="" class="img-thumbnail"></a>
							</div>
							<div class="col-md-8">
								<p>Lors du lancement de cette formation,une séance de prise en main séra à la porté de tous.</p>
								<i><mark>Date 03/03/2021 à Abidjan.</mark></i>
							</div>

							<!-- 3em block -->
							<div class="col-md-12">
								<h4>une formartion en javascript avancé</h4>
							</div>
							<div class="col-md-4">
								<a href="#"><img src="ADMIN/pages/formation/imageformation/elcodeur.jpg" width="" class="img-thumbnail"></a>
							</div>
							<div class="col-md-8">
								<p>Lors du lancement de cette formation,une séance de prise en main séra à la porté de tous.</p>
								<i><mark>Date 03/03/2021 à Abidjan.</mark></i>
							</div>
							
							
						</div>
					</div>		
	
<!-- fin -->
<div class="containerfluid" id="cest-du-top">
		<div class="row" id="block-encouragement">
			<div class="col-lg-12">
				<h1>Nous vous prions de bien vouloir resté toujours avec nous car notre succès vient en vous satisfaisant !</h1>
				<a href="#"><p><i>top c'est partir !</i></p></a>
			</div>
		</div>
		
	</div>

