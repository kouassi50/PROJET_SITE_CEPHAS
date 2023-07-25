<?php 
     

    $bd = new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if (isset($_GET['identiUser']) AND $_GET['identiUser']>0){  
        $getIdMem=intval($_GET['identiUser']);
         $requser=$bd->prepare("SELECT * FROM membres WHERE id_mem=?");
        $requser->execute(array($getIdMem));
          $userinfo=$requser->fetch();

          if (isset($_SESSION['idUser']) AND  $userinfo['id_mem']==$_SESSION['idUser']) {



  $reqCouleur=$bd->prepare("SELECT * FROM membres WHERE id_mem=?");
  $reqCouleur->execute(array($getIdMem));
  $afficheCouleur=$reqCouleur->fetch();
  

?> 

<!DOCTYPE html>
  <html lang="en">

       <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>default</title>

    
    <!-- Bootstrap core CSS-->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/sb-admin.min.css">

    <link href="public/disk/slimselect.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../ADMIN/cssPers/stylepers.css">

    

  </head>

  <body id="page-top">

    <style>
      .logo{
        padding-top: 1px;
    height: 50px;
      }
      .bg-green{
        background-color: #007E33;
      }
      .bg-blue{
        background-color: #3663b7;
      }
      .bg-red{
        background-color: #cc0000;
      }
      .bg-yellow{
        background-color: #FF8800;
      }
      .bg-purple{
        background-color: #9933cc;
      }
      .j-or{
        background-color: #efd807;
      }
      .bleu-ciel{
        background-color: #77b5fe;
      }
    </style>

    <nav class="navbar navbar-expand navbar-dark bg-<?= $afficheCouleur['apparence'];?> static-top">
      
      <a class="navbar-brand mr-1" href="index.html"><img src="image2.png" alt="" class="logo"></a>
    
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
       
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <!-- affichage de mon pseudo dans la partie déconnecter -->
            <img src="../ADMIN/pages/lesMembres/imgMembre/avatar1.png" class="rounded-circle img-responsive" width=30 height=30 style="margin-right: 3px;"><?= $userinfo['pseudo']; ?><i class="fas fa-caret-down fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=profil-membre"><i class="fas fa-eye"></i>  Mon profil</a>
            <a class="dropdown-item" href="edit-profil.html"><i class="fas fa-edit"></i>  Modifier mon profil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Deconnexion</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav bg-<?= $afficheCouleur['apparence'];?>">
        <li class="nav-item active">
          <a class="nav-link" href="?identiUser=<?=$_SESSION['idUser'];?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span>
          </a>
        </li>
        

          <?php
            if ($userinfo['statut']=='Admin-Principal') {
              ?>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-users"></i>
                  <!-- 1ere vague -->
                  <span>Membres</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           
                <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=ajout-membre">Ajouter</a>
                <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=gestion-membre">Gestion</a>
              
              </div>
            </li>
              <?php
               
               } 

              ?>
          

           
        <!-- 2em vague -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-graduation-cap"></i>
            <span>Formations</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=ajout-formation">Ajouter</a>
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=gestion-formation">Gestion</a>
          
          </div>
        </li>
        <!-- 3em vague -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cart-arrow-down"></i>
            <span>Produits</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=ajout-produits">Ajouter</a>
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=gestion-produits">Gestion</a>
          
          </div>
        </li>
        <!-- 4em vague -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-truck"></i>
            <span>Offres</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=ajout-offres">Ajouter</a>
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=gestion-offres">Gestion</a>
          
          </div>
        </li>
        <!-- 5em vague -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-plus-square"></i>
            <span>Autres</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=apparence"><span class="fa fa-paint-brush"></span> Apparences</a>
            <a class="dropdown-item" href="?identiUser=<?=$_SESSION['idUser'];?>&p=contactez-nous"><span class="fa fa-phone"></span> Contacts</a>
          
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li> 
      </ul>
      <!-- Le logo elCodeur Services -->
       

      <div id="content-wrapper">

        <div class="container-fluid">

            <?= $contenu; ?>
          
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Tous Droit Réservé 2021</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Alerte de deconnexion-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Déconnexion</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Voullez-vous vraiment vous déconnecter?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annullez</button>
            <a class="btn btn-primary" href="deconnexion.php">Se Déconnecter</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      setTimeout(function() {
        new SlimSelect({
          select: '#select'
        })
      }, 300)

      setTimeout(function() {
        new SlimSelect({
          select: '#select2'
        })
      }, 300)

      setTimeout(function() {
        new SlimSelect({
          select: '#select3'
        })
      }, 300)

      setTimeout(function() {
        new SlimSelect({
          select: '#select4'
        })
      }, 300)
    </script>

    
        
        <script src="public/disk/slimselect.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="public/vendor/chart.js/Chart.min.js"></script>
    <script src="public/vendor/datatables/jquery.dataTables.js"></script>
    <script src="public/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="public/js/demo/datatables-demo.js"></script>
    <script src="public/js/demo/chart-area-demo.js"></script>
    <script src="public/js/select2.min.js"></script>

  </body>

</html>




  <?php 

     }else{

           header("location: template/no-access.php");
     }
  }else{

      header("location: template/erreur-404.php");
  }

  

 ?>