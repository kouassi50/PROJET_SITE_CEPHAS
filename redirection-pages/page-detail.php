<?php 
 

	$db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ));

	
		
	?>
<div class="container" style="border:3px solid blue;">
<section id="plusExplications">

	<div class="row">
		<div class="col-lg-12" style="margin-top: 10px;text-align: center;">
			<?php 
				$compteur=$db->query('SELECT titre,description FROM offres');
			       $affiche=$compteur->fetchAll();
						foreach ($affiche as $affiches) {

							 echo "<h3 class='text-center'>DESSCRIPTION</h3><br><br>";
							 echo "<p style=margin:15px;>".$affiches['description']." </p><br>";
						}

			?>
		<div class="col-lg-12" style="margin-top: 10px;">

			<h3><i><strong>CEPHAS CONSULT-NEGOGE-SARL</strong> </i></h3>
			<p><mark>N° CI-ABJ-2017-B-14227.N° CC:1725609Q</mark>.  
			</p>
		</div>
	

		<div class="col-lg-12" style="margin-top: 10px;">
			<h3><i><strong>Nos Objectifs</strong> </i></h3>
			
			<p><span class="gra">*Aidé les hunivert du savoire</span> ds le perffectionnement des étudiants et diplômés et leurs permettre de parfait leurs images.<br>
			<span class="gra">*Diminué le taux de chômage</span> par la formation et l'encadrement des demaneurs d'emploi detenteur de projet.<br>
			<span class="gra">*Rendre les entreprises</span> plus performante attravert nos solutions afin de resisté aux intemperies et leurs permettre d'atteindre leurs objectifs.  
			</p>
		</div>
	</div>
	   
</section>
</div>
<div class="row">
		<div class="col-12">
			<img src="public/img/image2.png">
		</div>
</div>