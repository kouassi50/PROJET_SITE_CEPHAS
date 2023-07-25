<?php 
session_start();
	
 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ERROR-404</title>

    
    <!-- Bootstrap core CSS-->
    <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../public/css/sb-admin.css" rel="stylesheet">
    <link rel="../public/stylesheet" href="css/sb-admin.min.css">

    <link href="../public/disk/slimselect.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
  
  	<div class="container" style="margin-top: 30px;">
  		<div class="alert alert-danger">
  			<h1 class="text-center">Error 404</h1>
  			<h3 class="text-center">La page que vous recherchez n'existe pas ou une autre erreur s'est produite...</h3>
  		</div>
  		<a href="../index.php?identiUser=<?php echo $_SESSION['idUser'];?>" class="btn btn-info"><< Retour</a>
  	</div>
   
        
        <script src="disk/slimselect.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../public/vendor/jquery/jquery.min.js"></script>
    <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../public/vendor/chart.js/Chart.min.js"></script>
    <script src="../public/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../public/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../public/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../public/js/demo/datatables-demo.js"></script>
    <script src="../public/js/demo/chart-area-demo.js"></script>
    <script src="../public/js/select2.min.js"></script>


    <!-- les messages d'erreur:

    	 -->

  </body>

</html>
