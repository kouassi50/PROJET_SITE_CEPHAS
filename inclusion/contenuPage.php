<?php
	setlocale(LC_TIME,'fr');
	$db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ));
	
	$reqoffre=$db->query("SELECT id_offre, offres.titre, categorie_offres.titre as type, description, metiers, niveaux, experiences, lieu, logo, date_pub,couleur, date_exp, categorie_id
    FROM offres, categorie_offres
    WHERE  id_categorie = categorie_id

    ORDER BY  RAND()
    LIMIT 7");

   $offreinfo=$reqoffre->fetchALL(); 

   $reqformation=$db->query("SELECT * FROM formations ORDER BY   RAND() DESC LIMIT 3 ");
  $aff=$reqformation->fetchALL();

  if (isset($_POST['envoi'])) {
  	$mail=htmlspecialchars($_POST['mail']);
  	if (isset($mail)) {
  		if (filter_var($mail,FILTER_VALIDATE_EMAIL)) {
	     					
  			$reqmail=$db->prepare("SELECT * FROM abonnement WHERE email=?");
	     	$reqmail->execute(array($mail));
	     	$mailexist=$reqmail->rowCount();
	     	// verification si l'email n'existe pas ds la BD alors tu peut t'inscrire.
	     		if ($mailexist==0) {
	     			// préparation de la requette de BD
		     		$reqmail=$db->prepare("INSERT INTO abonnement SET email=?,date=NOW()");
		     		$reqmail->execute(array($mail));
		     		$success="Votre mail à été pris en compte !";
	     		}else{
	     			$erreur="Vous êtes déja un abonné . . .";
	     			}
	    }else{
	     	$erreur="Votre email n'est pas valide...";
	     	}
  	}

  }


 ?>

<style type="text/css">
	.titre h2{
		font-size: 35px;
		text-transform: uppercase;
		padding-bottom: 12px;
		margin-bottom: 18px;
		position: relative;
	}
	.titre h2::before{
		position: absolute;
		width: 100px;
		height: 2px;
		background: #666;
		bottom: -1px;
		margin-left: -50px;
		content: "";
		left: 50%;
	}
	.titre h2::after{
		position: absolute;
		width: 100px;
		height: 2px;
		background: #666;
		bottom: -6px;
		margin-left: -70px;
		content: "";
		left: 50%;
	}
	.titre h2 span{
		color: #ff8a07;
	}
	.detail{
		margin: 20px;
	}
	.titre a{
		margin-top: 15px;
		background: #ff8a07;
		padding: 5px;
		text-decoration: none;
		color: #fff;
		border-radius: 3px;
		font-size: 18px;
		font-weight: bold; 
	}
	.titre a:hover
	{
		background: green;

	}
	/*.titre p{
		width: 600px;
		font-size: 20px;
		margin: 50px 0 50px 0;

	}*/

	.img-offre
    {
        text-align: center;
        margin-top: 15px;
    }

    .card-offre 
    {
        color: white;
        padding: 4px;
        margin-top: 5px;
        text-align: center;
        width: 80%;
    }
    .date-offre 
    {
        margin-top: 5px;
    }

    .slider{
    	width: 100%;
    }
</style>

<section class="mt-5">
	<div class="container">
		<div class="row text-center">
			<div class="col-12">
				<div class="titre">
					<h2>Qui <span>Somme Nous</span></h2>
					<div class="row">
						<div class="col-md-5">
							<img src="public/img/formation4.jpg" style="height: 300px;">
						</div>
						<div class="col-md-7">
						<p><span> CEPHAS CONSULT-NEGOGE-SARL,</span>
						est une entreprise d'espertise multi-sectorielle.Elle vous offres une game de produit et services varié afin de touché du doigt et vous assisté ds sa fatisfaction ...</p>
						<a href="qui-sommes-nous.php">En Savoir Plus</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="mt-5">
	<div class="container">
		<div class="row text-center">
			<div class="col-12">
				<div class="titre">
					<h2><span>Nos Offres</span> | Emploi | Stage</h2>
					
				</div>
			</div>
		</div>
		<div class="row">
			<section class="variable slider">
        <?php foreach($offreinfo as $offreinfos){ ?>
            <div class="col-lg-2 col-6">
                <div class="card" style="width: 150px;">
                    <div class="img-offre">
                        <img src="ADMIN/pages/offres/imageoffre/<?= $offreinfos['logo'] ?>" alt="" style="width: 100px;height: 90px;">
                    </div>
                    
                       <div class="card-offre text-center" style="background: <?= $offreinfos['couleur'] ?>; ">
                       <?= $offreinfos['type'] ?>
                       </div>

                      <div class="date-offre text-center">
                         <p class="pub"><i class="fas far-fw fa-arrow-circle-up text-success"></i>  <?= strftime( '%a%d %b %Y',strtotime($offreinfos['date_pub'])) ?></p>
                         <p class="exp"><i class="fas far-fw fa-arrow-circle-down text-danger"></i>  <?= strftime( '%a%d %b %Y',strtotime($offreinfos['date_exp'])) ?></p>
                      </div>

                      <div class="titre-offre text-center">  
                         <a href="nos-offres.php" style="text-transform: uppercase; text-decoration: none;" class="font-weight-bold"><?= $offreinfos['titre'] ?></a> 
                      </div>
                    
                </div>
             </div>
        <?php } ?>
           </section>
           <div class="text-center" >
	           	<a href="nos-offres.php" class="btn btn-primary">Voir plus</a>
           </div>
           
             <script type="text/javascript">
			    $(document).on('ready', function() {
			      
			      $('.variable').slick({
			        slidesToShow: 5,
			        slidesToScroll: 1,
			        autoplay: true,
			        autoplaySpeed: 2000,
			      });
			      
			    });
			</script>
		</div>
	</div>
</section>
					

<section>
	<div class="container">
		<div class="row text-center">
			<div class="col-12">
				<div class="titre">
					<h2>Nos <span>formations</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($aff as $affich) { ?>
				
			
			<div class="col-lg-4">
				<div class="card" style="width: 300px;">
					<img src="ADMIN/pages/formation/imageformation/<?= $affich['image']?>" class="card-img-top img-center" style="height: 200px;text-align: center">
					<div class="card-body">
					<h4 class="titre text-primary" style="text-transform: uppercase;"><?= $affich['titre']?></h4>
					<p class="card-text font-weight-bold">Durée de la formation :<span class="text-danger"><?= $affich['duree']?>.</span> </p>
					<p class="card-text font-weight-bold">Début d'inscription :<span class="text-danger"> <?= $affich['date_pub']?>.</span></p>
					<p class="card-text font-weight-bold">Fin d'inscription :<span class="text-danger"><?= $affich['date_exp']?>.</span> </p>
					<a href="nos-formations.php" class="btn btn-primary"><i class="fas faw faw fa-plus"> Plus d'infos</i> </a>
				</div>
				</div>
				
			</div>
			
			<?php }  ?>

					
		</div>
	</div>
</section>

<section class="mt-5">
	<div class="container">
		<div class="row text-center">
			<div class="col-12">
				<div class="titre">
					<h2>Nos <span>Partenaires</span></h2>
					<div class="row">
						<div class="col-md-5">
							<img src="public/img/favicon.png" style="height: 300px;">
						</div>
						<div class="col-md-7">
						<p><span> CEPHAS CONSULT-NEGOGE-SARL,</span>
						est une entreprise d'espertise multi-sectorielle.Elle vous offres une game de produit et services varié afin de touché du doigt et vous assisté ds sa fatisfaction ...</p>
						<a href="nos-partenaires.php">En Savoir Plus</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="mt-5">
	<div class="container">
		<div class="row text-center">
			<div class="col-12">
				<div class="titre">
					<h2>Abonnez-vous à notre <span>Newsletter</span></h2>
				</div>
			</div>
			<div class="col-lg-12">
				<?php if (isset($success)) { ?>
					<div class="alert alert-success text-center"><?= $success; ?></div>
				<?php } if (isset($erreur)) { ?>
				
				<div class="alert alert-danger text-center"><?= $erreur; ?></div>
				<?php } ?>

			</div>
		</div>
	</div>
	<div class="row" style="background: #08059d;padding: 50px;opacity: 0.9">
			<div class="col-lg-12 text-center">
				<h1 style="color: white;text-transform: uppercase;font-family: Lucida Calligraphy"><marquee> Toujours prêt à vous satisfaire <i>!</marquee></i></h1>
				<div class="form">
					<form method="POST">
						<div class="input-group">
							<input type="email" name="mail" class="form-control p-4" placeholder=" Entrez votre email!" required>
							<div class="input-group-btn">
								<button class="btn btn-success" name="envoi" type="submit" style="padding: 12px;"><i class="fas faw fa-envelope"></i></button>
							</div>
						</div>
					</form>
				</div>
				
			</div>	
		</div>
</section>