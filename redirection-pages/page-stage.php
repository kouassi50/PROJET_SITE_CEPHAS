<?php 

	setlocale(LC_TIME,'fr');
	$db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ));
	
	$reqemploi=$db->query("SELECT * FROM offres WHERE categorie_id=2 ORDER BY titre");

    $empinfo=$reqemploi->fetchAll();

    


?>
<style type="text/css">
	.block-general{
 		padding: 10px 0 15px 0;
		margin-top: 15px;
		background: #fff;
 	}
 	.block1{
		padding: 5px 20px 10px 10px;
		background: #e6e9f0;
		margin: 13px 5px 5px 10px;
	}
	.ici{
		margin-left: 100px;
		padding: 15px;
	}
	#derniere-block{
		margin-top: 30px;
		background-image: url('ADMIN/pages/offres/imageoffre/logo3.jpg');
		background-position: 100%;
		position: relative;
		background-size: cover;
		background-repeat: no-repeat;
		text-align: center;
		padding: 60px 0;
	}
	#derniere-block h1{
		margin-top: 25px;
		color: #22a;
		text-align: center;
		font-weight: bold;text-transform: uppercase;
		
	}
	#derniere-block a{
		color: #fff;
		font-size: 20px;
		text-decoration: none;
		margin: 15px 0 20px 0;
	}
	#derniere-block a:hover{
		color: #000;
		font-weight: bold;
	}
</style>

	
		<div class="container text-center" style="margin-top: 30px;">
			<h2>
				<span class="badge badge-striped badge-pill badge-info" style="padding: 15px;">
					
					<span style="color: red;">
						<?php 
								$compteur=$db->query("SELECT count(id_offre) AS nombreStage FROM offres WHERE categorie_id=2");
								
								$affiche=$compteur->fetchAll();
								foreach ($affiche as $affiches) {
									echo $affiches['nombreStage'];
								
									
								}
						?>
					</span>
					
						OFFRES De Stage <span class="text-danger">.</span>
				</span>
			</h2>

						
		</div>
		<div class="containerfluid" id="cest-du-top">
		<div class="row" id="derniere-block">
			<div class="col-lg-12">
				<h1>Merci de bien pour le temps passé sur cette plate-forme d'offre</h1>
				<a href="#"><p><i>C'est du top ici !</i></p></a>
			</div>
		</div>
		
	</div>
		<div class="row block-general">
			<div class="col-lg-8" style="">
				<?php foreach ($empinfo as $tout_offre) {
				?>

				
					
						<div class="row block1">
							<h1 class="text-center"></h1>
							
							<div class="col-lg-2">
								<h2 style="margin-top: 40px;"><img src="ADMIN/pages/offres/imageoffre/<?=  $tout_offre['logo'] ?>" class="img img-thumbnail"></h2>
							</div>
							<div class="col-lg-8">
								<div class="ici" style="margin-left: 100px;padding: 15px;">
									<h3><i>Lieu: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['lieu'] ?></span></h3>
									<h3><i>Niveux d'études: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['niveaux'] ?></span></h3>
									<h3><i>Expériences: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['experiences'] ?></span></h3>
									<h3><i>Domaines: </i><span style="color: orange;font-size: 18px;"><?= $tout_offre['metiers'] ?></span></h3>
									<h3><i>D'escription: </i><a href="detail-stage.php" class="btn btn-warning">	Voir plus</a></h3>
								</div>
							</div>
							<div class="col-lg-2 ">
								<span class="badge badge-info" style="padding: 10px;font-size: 18px;float: right;margin-top:10px;">
									<?= $tout_offre['titre']?>
								</span>
							</div>
							<div class="text-center bg-dark" style="margin-left: 25px;padding: 4px;margin-top: 8px;">
								<h3 style="font-size: 22px;color: #fff;"><i class="fas fa-plus" style="margin-right: 5px; font-size: 15px;"> Date d'édition: </i><span style="color: orange;margin-right: 10px;"> <?= $tout_offre['date_pub'] ?> </span><i class="fas fa-plus" style="margin-right: 5px; font-size: 22px;color: #fff;"> Date limite: </i><span style="color: orange;margin-right: 10px;"> <?= $tout_offre['date_exp'] ?> </span><i class="fas fa-plus" style="margin-right: 5px; font-size: 22px;color: #fff;"> icone </i><span style="color: orange;margin-right: 10px;">Côte d'Ivoire </span></h3>
							</div>
						</div>
						<?php } ?>
					</div>
						
			
					<div class="col-lg-4" style="background: #fff;padding-top: 10px;">
						<div class="card">
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
	</div>

