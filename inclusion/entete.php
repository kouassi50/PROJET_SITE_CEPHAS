<?php 
 ?>
<style type="text/css">
	
	.dropdown:hover .dropdown-menu{
		display: block;
		transition: 0.9s ease-out;
	}
	ul li a{
		margin-right: 15px;
		letter-spacing: 2px;
		font-weight: bold;

	}
	nav{
		/*margin-bottom: 40px;*/
	}

</style>

 <nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="fleche">
 	<div class="navbar-header">
 		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#maNavBar" >
 			<span class="navbar-toggler-icon"></span>	
 		</button>
 		<a href="#" class="navbar-brand"><img src="public/img/logocephas.png" width="300px;"></a>
 		
 	</div>
 	<!-- mes menus -->
 	<div class="collapse navbar-collapse" id="maNavBar">
 		<ul class="navbar-nav ml-auto">

 			<li class="nav-item"><a href="indexcephas.php" class="nav-link"><span class="glyphicon glyphicon-home"></span>Acceuil</a></li>

 			<li class="nav-item"><a href="qui-sommes-nous.php" class="nav-link"><span class="glyphicon glyphicon-home"></span>Qui Somme Nous</a></li>

 			<li class="nav-item"><a href="nos-formations.php" class="nav-link"><span class="glyphicon glyphicon-home"></span>Nos Formations</a></li>

 			<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" id="navbarDrop" data-toggle="dropdown"><span class="glyphicon glyphicon-"></span>Nos Offres</a>
 				<div class="dropdown-menu">
 					<a href="nos-emplois.php" class="dropdown-item">Emploi</a>
 					<a href="nos-stage.php" class="dropdown-item">Stage</a>
 					<a href="nos-offres.php" class="dropdown-item">Toutes les Offres</a>
 				</div>
 			</li>

 			<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" id="navbarDrop" data-toggle="dropdown"><span class="glyphicon glyphicon-"></span>Nos Produits</a>
 				<div class="dropdown-menu">
 					<a href="nos-produits-cos.php" class="dropdown-item">Cosmétique</a>
 					<a href="nos-aliments.php" class="dropdown-item">Alimentaire</a>
 				</div>
 			</li>

 			<li class="nav-item"><a href="nos-contacts.php" class="nav-link"><span class="glyphicon glyphicon-home"></span>Contactez-Nous</a></li>

 			<a href="#fleche2"><li class="fas fa-chevron-down top"></li></a>

 		</ul>
 	</div>
 </nav>

 <!-- fin nav -->