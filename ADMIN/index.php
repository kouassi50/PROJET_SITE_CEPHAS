<?php 
session_start(); 
	$db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	if (isset($_POST['connexion'])) {
		$monEmail=htmlspecialchars($_POST['mail']);
		$monMotDePass=sha1($_POST['mdp']);
    // var_dump(sha1($_POST['mdp']));
    // die();
		if (!empty($monEmail) && !empty($monMotDePass)) {
			$reqUser=$db->prepare("SELECT * FROM membres WHERE mdp=? AND email=?");
			$execution=$reqUser->execute(array($monMotDePass,$monEmail));
			$userExiste=$reqUser->rowCount();

			if ($userExiste==1) {
				$userInfo=$reqUser->fetch();
				$_SESSION['idUser']=$userInfo['id_mem'];
				$_SESSION['mdpUser']=$userInfo['mdp'];
				$_SESSION['emailUser']=$userInfo['email'];
				header("location:espace_admin.php?identiUser=".$_SESSION['idUser']);
			}
		}else{
			$error="Tout les les champs doivent être complètés...";
		}

		
	}



?>
		
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connexion à Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="public/css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Connexion</div>
        <div class="card-body">
        	 <?php
	        	 if (isset($error)) {
	        	  
	        	 	?>
  						<div class="container">
  						     <div class="alert alert-danger">
  						       <?= $error; ?>

  						     </div>
  						</div>
	        	 	<?php
        	 	} 	
         	?>
        	
          <form method="POST" action="" rol="form">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus="autofocus" name="mail">
                <label for="inputEmail">Adresse Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="mdp">
                <label for="inputPassword">Mot de Passe</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember">
                  Se Souvenir de moi
                </label>
              </div>
            </div>
           <input type="submit" class="btn btn-primary btn-block"  name="connexion" value="Se Connecter">
          </form>
          <div class="text-center">
           
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
