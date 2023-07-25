  
<?php 

	$db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ));
	


?>
<style type="text/css">
    h3{
		font-size: 35px;
		text-transform: uppercase;
		padding-bottom: 12px;
		margin-bottom: 18px;
		position: relative;
	}
	h3::before{
		position: absolute;
		width: 100px;
		height: 2px;
		background: #666;
		bottom: -1px;
		margin-left: -50px;
		content: "";
		left: 50%;
	}
	 h3::after{
		position: absolute;
		width: 100px;
		height: 2px;
		background: #666;
		bottom: -6px;
		margin-left: -70px;
		content: "";
		left: 50%;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>CEPHAS|CI</title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/font/all.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="public/slick/slick.css">
  	<link rel="stylesheet" type="text/css" href="public/slick/slick-theme.css">



	<script src="public/js/jquery-3.4.0.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/slick/jquery.js" type="text/javascript"></script>
  <script src="public/slick/slick.js" type="text/javascript" charset="utf-8"></script>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

</head>
<body>
	
	<div class="container-fluid" style="">
		
			<?php  include("inclusion/entete.php"); ?>
			<?php  include("inclusion/banire-formation.php"); ?>
			<?php  include("redirection-pages/page-detail-stage.php"); ?>
			

	</div>
	
		
				
	<?php  include("inclusion/pied.php"); ?>
</body>
</html>
<!-- piéd de page -->
	