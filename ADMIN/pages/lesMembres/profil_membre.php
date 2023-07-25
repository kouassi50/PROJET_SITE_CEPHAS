<?php 
	$bd = new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $reqProfil=$bd->prepare("SELECT * FROM membres WHERE id_mem=?");
	  $reqProfil->execute(array($_SESSION['idUser']));
	  $afficheProfil=$reqProfil->fetch();
 ?>

<div class="container">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<div class="card" style="border: 2px solid;border-radius: 5px;margin-top: 50px;">
				<div class="card-header text-center text-white bg-dark" style="border-radius: 3px;">
					<h3 class="fa fa-user"><strong> Mon Profil</strong> </h3>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-sm-7">
							<p><strong style="font-weight: bold;font-size: 20px;">Nom : </strong><em><?= $afficheProfil['nom'];?></em></p>
							<p><strong style="font-weight: bold;font-size: 20px;">Prénoms : </strong><em><?= $afficheProfil['prenoms'];?></em></p>
							<p><strong style="font-weight: bold;font-size: 20px;">Pseudo : </strong><em><?= $afficheProfil['pseudo'];?></em></p>
							<p><strong style="font-weight: bold;font-size: 20px;">Email : </strong><em><?= $afficheProfil['email'];?></em></p>
							<p><strong style="font-weight: bold;font-size: 20px;">Mot de passe : </strong><em>****</em></p>
						</div>				
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-2"></div>

		<!-- creation de progress bar -->
	</div>
	
</div>