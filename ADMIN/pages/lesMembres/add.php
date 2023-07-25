<?php
	// session_start();

    $bd = new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	    if (isset($_POST['envoi'])) {

	     	$nom=htmlspecialchars($_POST['nom']);
	     	$prenom=htmlspecialchars($_POST['prenom']);
	     	$pseudo=htmlspecialchars($_POST['pseudo']);
	     	$mail=htmlspecialchars($_POST['mail']);
	     	$mail2=htmlspecialchars($_POST['mail2']);
	     	$mdp=sha1($_POST['mdp']);	//il permet de cripté le mot de passe en ****
	     	$mdp2=sha1($_POST['mdp2']);
	     	$statut=$_POST['statut'];
	     	

	     		// si les champs ne sont pas vide faire l'instruction
	     	if (!empty($nom) && !empty($prenom) && !empty($pseudo) && !empty($mail) && !empty($mail2) && !empty($mdp) && !empty($mdp2) && !empty($statut)) {

	     				// l'instruction à faire
	     		$pseudolong=strlen($pseudo);
	     			// verification des longueurs de caractères à saisir
	     		if ($pseudolong<=10) {
	     			// verification si le prémier email = au deuxiemme de confirmation

	     			if ($mail==$mail2) {

	     				// verification si les email sont filtrés(@,_,123...)
	     				if (filter_var($mail,FILTER_VALIDATE_EMAIL)) {
	     					// préparation de la requette de BD
	     					$reqmail=$bd->prepare("SELECT * FROM membres WHERE email=?");
	     					$reqmail->execute(array($mail));
	     					$mailexist=$reqmail->rowCount();

	     					// verification si l'email n'existe pas ds la BD alors tu peut t'inscrire.
	     					if ($mailexist==0) {

	     						#verification sur la longueur les mdps aussi
	     						$mdplong=strlen($mdp);
	     						if ($mdp==$mdp2) {
	     							$insertion=$bd->prepare("INSERT INTO membres SET nom=?,prenoms=?,pseudo=?,mdp=?,email=?,date_ins=NOW(),statut=?");
	     							$execution=$insertion->execute(array($nom,$prenom,$pseudo,$mdp,$mail,$statut));

	     							// si l'insertion est faite,rentre dans la condition et est vrai
	     							if ($mdplong>=4) {
		     							$succes="Félicitation! $prenom $nom a bien ètè inscrit avec succès | <a href='?identiUser=$_SESSION[idUser]&p=gestion-membre'>Gestion des membres</a> :)";
		     						}
		     						
	     						}else{
	     							$erreur="Les mots de passe donner ne correspondent pas . . .";
	     						}
	     					}else{
	     						$erreur="Cet email existe déjà . . .";
	     					}
	     				}else{
	     					$erreur="Votre email n'est pas valide...";
	     				}
	     				
	     			}else{
	     				$erreur="Erreur $mail != $mail2 ! Les emails entrés ne correspondent pas . . .";
	     			}

	     			
	     		}else{
	     			$erreur="Erreur $pseudo = $pseudolong !  Le pseudo doit contenir une longueur d'au moins 5 caractères...";
	     		}
	     		

	     	}else{
	     		$erreur="Erreur ! Tout les champs doivent être remplis . . .";
	     	}

	     } 


 ?>
  <!-- bar de précision-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Tableau De Bord</a>
            </li>
            <li class="breadcrumb-item">Membre</li>
            <li class="breadcrumb-item active">Ajouter</li>
          </ol>
          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header bg-primary text-white">
              FORMULAIRE D'INSCRIPTION</div><br>
            <div class="card-body">
            		<!--partie message d'erreur  -->
            		
				  	<?php
			        	if (isset($erreur)) {
			        	  
			        	 	?>
								<div class="container">
								     <div class="alert alert-danger text-center" style="font-weight: bold;">
								       <?= $erreur; ?>
								     </div>
								</div>
			        	 	<?php
		        	 	} 	
         			?>
         			<?php
			        	if (isset($succes)) {
			        	  
			        	 	?>
								<div class="container">
								     <div class="alert alert-success text-center" style="font-weight: bold;">
								       <?= $succes; ?>
								     </div>
								</div>
			        	 	<?php
		        	 	} 	
         			?>
				  			<!-- fin erreur -->

            	<form method="POST" action="" rol="form" class="form-horizontal">
            			
            		<div class="form-group">
            			<div class="row">
            				<label for="" class="col-sm-3 control-label">NOM   :</label>
	            			<div class="col-sm-9">
	            				<input type="text" id="nom" name="nom" class="form-control" value="<?php if(isset($nom)){ echo $nom;}?>">	
	            			</div>
            			</div>
            		</div>
            		<div class="form-group">
            			<div class="row">
            				<label for="prenom" class="col-sm-3 control-label">PRENOMS   :</label>
	            			<div class="col-sm-9">
	            				<input type="text" id="prenom" name="prenom" class="form-control" value="<?php if(isset($prenom)){ echo $prenom;}?>">
	            			</div>
            			</div>
            		</div>
            		<div class="form-group">
            			<div class="row">
            				<label for="pseudo" class="col-sm-3 control-label">PSEUDO   :</label>
	            			<div class="col-sm-9">
	            				<input type="text" id="pseudo" name="pseudo" class="form-control" value="<?php if(isset($pseudo)){ echo $pseudo;}?>">
	            			</div>
            			</div>
            		</div>
            		<div class="form-group">
            			<div class="row">
            				<label for="mail" class="col-sm-3 control-label">EMAIL   :</label>
	            			<div class="col-sm-9">
	            				<input type="email" id="mail" name="mail" class="form-control" value="<?php if(isset($mail)){ echo $mail;}?>">
	            			</div>
            			</div>
            		</div>
            		<div class="form-group">
            			<div class="row">
            				<label for="mail2" class="col-sm-3 control-label">CONFIRMER LE EMAIL   :</label>
	            			<div class="col-sm-9">
	            				<input type="email" id="mail2" name="mail2" class="form-control" value=" <?php if(isset($mail2)){ echo $mail2;}?>">
	            			</div>
            			</div>
            		</div>
            		<div class="form-group">
            			<div class="row">
            				<label for="mdp" class="col-sm-3 control-label">MOT DE PASSE   :</label>
	            			<div class="col-sm-9">
	            				<input type="password" id="mdp" name="mdp" class="form-control" value="">
	            			</div>
            			</div>
            		</div>
            		<div class="form-group">
            			<div class="row">
            				<label for="mdp2" class="col-sm-3 control-label">CONFIRMER LE MOT DE PASSE   :</label>
	            			<div class="col-sm-9">
	            				<input type="password" autofocus="autofocus" id="mdp2" name="mdp2" class="form-control" value="">
	            			</div>
            			</div>
            		</div>
            		<div class="form-group">
            			<div class="row">
            				<label for="" class="col-sm-3 control-label">STUT  :</label>
	            			<div class="col-sm-9">
	            				<label class="radio-inline" name="statut">
	            					<input type="radio" name="statut" checked value="Admin-Principal">Admin-Principal
	            				</label><br>
	            				<label class="radio-inline" name="statut">
	            					<input type="radio" name="statut" value="Admin-Sécondaire">Admin-Sécondaire
	            				</label>
	            			</div>
            			</div>
            		</div><br>
            		<div class="form-group">
            			<div class="row">
            				<label for="" class="col-sm-3 control-label"></label>
	            			<div class="col-sm-9">
	            				<input type="submit" id="mdp2" name="envoi" value="V A L I D E R" class=" btn btn-info">
	            			</div>
            			</div>
            		</div>

            		
            	</form>
              
            </div>
            
          </div>