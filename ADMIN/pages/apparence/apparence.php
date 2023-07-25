<?php
    $db= new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    if (isset($_POST['envoi'])) {
         $couleur=$_POST['couleur'];
         if (isset($couleur)) {
             $requete=$db->prepare("UPDATE membres SET apparence=? WHERE id_mem=?");
             $requete->execute(array($couleur,$_SESSION['idUser']));
            
         }
     } 

 ?>
 
 <!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Couleurs</li>
           <li class="breadcrumb-item active">Apparences</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header bg-dark text-white">
             <h1 class="text-center">CHOIX D'APPARENCE ADMINISTRATION</h1></div><br>
 <div class="container text-center">
     <h4 class="" style="font-size: 25px; margin-bottom: 30px;">Choisissez une apparence de votre choix pour votre espace d'administration,puis validez.</h4>

     <form method="POST" action="" rol="form" class="form-horizontal">
                   
                    <div class="form-group">
                        <div class="row">
                         
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="couleur" checked value="dark"> <span class="badge badge-dark badge-pill" style="padding: 5px;"> DARK</span>
                                </label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="couleur" value="green"> <span class="badge badge-success badge-pill" style="padding: 5px;"> GREEN</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="couleur" value="blue"> <span class="badge badge-info badge-pill" style="padding: 5px;"> BLUE</span>
                                </label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="couleur" value="red"> <span class="badge badge-danger badge-pill" style="padding: 5px;"> RED</span>
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline" >
                                    <input type="radio" name="couleur" value="yellow"> <span class="badge badge-warning badge-pill" style="padding: 5px;"> YELLOW</span>
                                </label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="couleur" value="purple"> <span class="badge badge-secondary badge-pill" style="padding: 5px;"> PURPLE</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" id="mdp2" name="envoi" value="V A L I D E R" class=" btn btn-block btn-info">
                            </div>
                            <div class="col-sm-4">
                                
                            </div>
                        </div>
                    </div>

                    
                </form>
 </div>
 