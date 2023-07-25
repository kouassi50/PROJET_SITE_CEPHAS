<?php 

	setlocale(LC_TIME,'fr');
	$db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ));
	
	$reqcosmetique=$db->query("SELECT * FROM produit WHERE type_id=2 ORDER BY prix DESC");

    $cosInfo=$reqcosmetique->fetchAll();

    


?>


	
		<div class="container text-center" style="margin-top: 30px;">
			<h2>
				<span class="badge badge-striped badge-pill badge-info" style="padding: 15px;">
					
					<span style="color: red;">
						<?php 
								$compteur=$db->query("SELECT count(type_id) AS nombreAlimentaire FROM produit WHERE type_id=2");
								
								$affiche=$compteur->fetchAll();
								foreach ($affiche as $affiches) {
									echo $affiches['nombreAlimentaire'];
								
									
								}
						?>
					</span>
					
						Produit(s)  Alimentaire(s) <span class="text-danger">.</span>
				</span>
			</h2>

						
		</div>
		<div class="row" style="padding: 5px;">
			<div class="col-lg-8" style="">
				<?php foreach ($cosInfo as $tout_offre) {
				?>

				
					
						<div class="row blokc1" style="padding: 15px 0 5px 30px;background: #e6e9f0;">
							<h1 class="text-center"></h1>
							
							<div class="col-lg-2">
								<h2 style="margin-top: 40px;"><img src="ADMIN/pages/produits/imgsProduit/<?=  $tout_offre['image'] ?>" class="img img-thumbnail"></h2>
							</div>
							<div class="col-lg-8">
								<div class="ici" style="margin-left: 100px;padding: 15px;">
									<h3 style="text-align: center;"><i>Libéllé: </i><br><span style="color: orange;font-size: 18px;"><?= $tout_offre['libelle'] ?></span></h3>
									<h3 style="text-align: center;"><i class="text-center">Description </i><br><span style="color: orange;font-size: 18px;"><?= $tout_offre['details'] ?></span></h3>
									
								</div>
							</div>
							<div class="col-lg-2 ">
								<span class="badge badge-info" style="padding: 10px;font-size: 18px;float: right;">
									<?= $tout_offre['libelle']?>
								</span>
							</div>
							<div class="text-center bg-dark" style="margin-left: 25px;padding: 4px;">
								<h3 style="font-size: 22px;color: #fff;"><i class="fas fa-plus" style="margin-right: 5px; font-size: 15px;"> Date d'édition: </i><span style="color: orange;margin-right: 10px;"> <?= $tout_offre['date_fab'] ?> </span><i class="fas fa-plus" style="margin-right: 5px; font-size: 22px;color: #fff;"> Date limite: </i><span style="color: orange;margin-right: 10px;"> <?= $tout_offre['date_exp'] ?> </span><i class="fas fa-plus" style="margin-right: 5px; font-size: 22px;color: #fff;"> icone </i><span style="color: orange;margin-right: 10px;">Côte d'Ivoire </span></h3>
							</div>
						</div>
						<?php } ?>
					</div>
						
			
					<div class="col-lg-4" style="background: #e6e9f0;padding-top: 40px;">
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

