<?php 
  $db=new PDO('mysql:host=localhost;dbname=db_cephas','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if (isset($_POST['envoi'])) {
  
  $date_exp=$_POST['date_exp'];
  $titre=htmlspecialchars($_POST['titre']);
  $categorie=$_POST['categorie'];
  $metiers=implode(", ",$_POST['metiers']);
  $niveaux=implode(", ",$_POST['niveaux']);
  $experience=$_POST['experience'];
  $lieu=htmlspecialchars($_POST['lieu']);
  $description=$_POST['description'];
  $profil=$_POST['profil'];
  $candidature=$_POST['candidature'];


  $tmp_name=$_FILES['logo']['tmp_name'];
  $nom_logo=$_FILES['logo']['name'];
  $taille=$_FILES['logo']['size'];
  $type=basename($_FILES['logo']['type']);


  if ($taille<2097152) {

        $extensionvalide=array('png','jpeg','jpg');
        if (in_array($type,$extensionvalide)) {

          $chemin="../ADMIN/pages/offres/imageoffre/".$nom_logo;
          if (is_uploaded_file($tmp_name)) {

            move_uploaded_file($tmp_name,$chemin);


             
          }
          
        }else{
          $erreur= "le fichier doit etre de format:'png','jpeg','jpg'";
        }
      
    }else{
        $erreur= "la taille maximale doit etre de 2 Mo ";

      }



      if (isset($titre) AND isset($description) AND isset($profil) AND isset($candidature) AND isset($metiers) AND isset($niveaux) AND isset($experience) AND isset($lieu) AND isset($date_exp) AND isset($categorie)) {
        
        $inserer = $db->prepare("INSERT INTO offres SET titre=?, description=?, profil_post=?, candidature=?, metiers=?, niveaux=?, experiences=?, lieu=?, logo=?, date_pub=NOW(), date_exp=?, categorie_id=?, mem_id=?");
        $inserer->execute(array($titre, $description, $profil, $candidature, $metiers, $niveaux, $experience, $lieu, $nom_logo, $date_exp, $categorie, $_SESSION['idUser']));


        $succes = "Votre offre a bien été enregistrée |  <a href='?identiUser=$_SESSION[idUser]&p=gestion-offres'>Gestion</a>";



      }

}
 ?>

 <!-- bar de précision-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
           <a href="#">Tableau De Bord</a>
        </li>
        <li class="breadcrumb-item">Offres</li>
           <li class="breadcrumb-item active">Ajout</li>
    </ol>
        <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header text-white" style="background: #12f022;">
              AJOUTEZ VOS OFFRES</div><br>
          <div class="card-body">
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


<form method="POST" class="horizontal" enctype="multipart/form-data">
              <div class="form-group">
                 <div class="row">
                 <label class="col-sm-3 control-label">Date de publication:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" disabled value="<?php echo date('d/m/Y');?>">
                  </div>
                  </div>
                  
                  
              </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Date d'expiration:</label>
                  <div class="col-sm-8">
                    <input type="date" name="date_exp" class="form-control" value="" required>
                  </div>
                  </div>
                  
                  
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">titre de l'offre:</label>
                  <div class="col-sm-8"><input type="text" name="titre" class="form-control" value="" required>
                    </div>
                  </div>
                  
                  
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">type d'offre:</label>
                  <div class="col-sm-8">
                    <select name="categorie" class="form-control" required>
                      <option value="1">Emploi</option>
                      <option value="2">Stage</option>
                      <option value="3">Interim</option>
                      <option value="4">Freelance</option>
                      <option value="5">Consultant</option>
                    </select>
                  </div>
                  </div>
                  
                  
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Metier(s):</label>
                  <div class="col-sm-8">
                    <select name="metiers[]"  multiple id="select" required>
                      <option value="Actuariat">Actuariat</option>
                                  <option value="Aéronautique">Aéronautique</option>
                                  <option value="Agriculture">Agriculture</option>
                                  <option value="Agroéconomie">Agroéconomie</option>
                                  <option value="Agronomie">Agronomie</option>
                                  <option value="Aide soignant">Aide soignant</option>
                                  <option value="Aménagement du Territoire">Aménagement du Territoire</option>
                                  <option value="Anthropologie">Anthropologie</option>
                                  <option value="Aquaculture">Aquaculture</option>
                                  <option value="Architecture">Architecture</option>
                                  <option value="Archivistique">Archivistique</option>
                                  <option value="Assistanat de Direction">Assistanat de Direction</option>
                                  <option value="Assurance">Assurance</option>
                                  <option value="Auxiliaire en pharmacie">Auxiliaire en pharmacie</option>
                                  <option value="Banque">Banque</option>
                                  <option value="Bâtiment">Bâtiment</option>
                                  <option value="Biochimie">Biochimie</option>
                                  <option value="Biologie">Biologie</option>
                                  <option value="Biomédical">Biomédical</option>
                                  <option value="Blanchisserie">Blanchisserie</option>
                                  <option value="Boucherie">Boucherie</option>
                                  <option value="Boulangerie">Boulangerie</option>
                                  <option value="Caisse">Caisse</option>
                                  <option value="Calligraphie/Sérigraphie">Calligraphie/Sérigraphie</option>
                                  <option value="Cariste">Cariste</option>
                                  <option value="Carrelage">Carrelage</option>
                                  <option value="Cartographie">Cartographie</option>
                                  <option value="Chaudronnerie">Chaudronnerie</option>
                                  <option value="Chimie">Chimie</option>
                                  <option value="Coiffure">Coiffure</option>
                                  <option value="Collectivités Territoriales">Collectivités Territoriales </option>
                                  <option value="Commerce et Administration des Entreprises">Commerce et Administration des Entreprises</option>
                                  <option value="Commerce/Ventes">Commerce/Ventes</option>
                                  <option value="Communication">Communication</option>
                                  <option value="Construction Metallique">Construction Metallique</option>
                                  <option value="Contrôle de gestion/Audit">Contrôle de gestion/Audit</option>
                                  <option value="Contrôle Industriel et Régulation Automatique">Contrôle Industriel et Régulation Automatique</option>
                                  <option value="Cosmétologie">Cosmétologie</option>
                                  <option value="Couture/Broderie">Couture/Broderie</option>
                                  <option value="Criminologie">Criminologie</option>
                                  <option value="Délégation médicale">Délégation médicale</option>
                                  <option value="Documentation">Documentation</option>
                                  <option value="Econométrie">Econométrie</option>
                                  <option value="Economie">Economie</option>
                                  <option value="Education/Enseignement">Education/Enseignement</option>
                                  <option value="Electrobiomédical">Electrobiomédical</option>
                                  <option value="Electrobobinage">Electrobobinage</option>
                                  <option value="Electromécanique">Electromécanique</option>
                                  <option value="Electronique">Electronique</option>
                                  <option value="Electrotechnique/Electricité">Electrotechnique/Electricité</option>
                                  <option value="Elevage">Elevage</option>
                                  <option value="Energétique">Energétique</option>
                                  <option value="Entretien/Nettoyage">Entretien/Nettoyage</option>
                                  <option value="Environnement">Environnement </option>
                                  <option value="Esthétique/Beauté">Esthétique/Beauté</option>
                                  <option value="Ferraillage">Ferraillage</option>
                                  <option value="Ferronnerie">Ferronnerie</option>
                                  <option value="Finances/Comptabilité">Finances/Comptabilité</option>
                                  <option value="Fiscalité">Fiscalité</option>
                                  <option value="Foresterie">Foresterie</option>
                                  <option value="Froid">Froid</option>
                                  <option value="Généraliste">Généraliste</option>
                                  <option value="Génie Civil/Travaux publics">Génie Civil/Travaux publics</option>
                                  <option value="Génie Mécanique et Productique">Génie Mécanique et Productique</option>
                                  <option value="Géomètre/Topographe">Géomètre/Topographe </option>
                                  <option value="Gestion">Gestion</option>
                                  <option value="Gestion des PME-PMI">Gestion des PME-PMI </option>
                                  <option value="Hôtellerie/Restauration">Hôtellerie/Restauration</option>
                                  <option value="Hydraulique">Hydraulique</option>
                                  <option value="Hygiène Industrielle">Hygiène Industrielle </option>
                                  <option value="Immobilier">Immobilier</option>
                                  <option value="Imprimerie">Imprimerie</option>
                                  <option value="Incendie Prévention">Incendie Prévention </option>
                                  <option value="Industrie Agro-alimentaire">Industrie Agro-alimentaire</option>
                                  <option value="Infographie">Infographie</option>
                                  <option value="Informatique">Informatique</option>
                                  <option value="Informatique de Gestion">Informatique de Gestion</option>
                                  <option value="Journalisme">Journalisme</option>
                                  <option value="Juridique/Droit">Juridique/Droit</option>
                                  <option value="Logistique/Transport">Logistique/Transport </option>
                                  <option value="Magasinage">Magasinage</option>
                                  <option value="Maintenance des Systèmes de Production">Maintenance des Systèmes de Production</option>
                                  <option value="Maintenance Informatique">Maintenance Informatique</option>
                                  <option value="Maintenance véhicules et engins">Maintenance véhicules et engins</option>
                                  <option value="Management">Management</option>
                                  <option value="Marketing">Marketing</option>
                                  <option value="Mathématique Financière">Mathématique Financière</option>
                                  <option value="Mécanique">Mécanique</option>
                                  <option value="Mécanique et Automatisme Industriel">Mécanique et Automatisme Industriel</option>
                                  <option value="Médecine/Santé">Médecine/Santé</option>
                                  <option value="Menuiserie">Menuiserie</option>
                                  <option value="Météorologie">Météorologie</option>
                                  <option value="Mines/Géologie/Pétrole">Mines/Géologie/Pétrole </option>
                                  <option value="Moteurs et Equipements Motorisés">Moteurs et Equipements Motorisés</option>
                                  <option value="Musique">Musique</option>
                                  <option value="NTIC">NTIC</option>
                                  <option value="Optique/Lunetterie">Optique/Lunetterie</option>
                                  <option value="Pêche">Pêche</option>
                                  <option value="Peinture">Peinture</option>
                                  <option value="Pharmacie">Pharmacie</option>
                                  <option value="Philosophie">Philosophie</option>
                                  <option value="Photographie">Photographie</option>
                                  <option value="Phytosanitaire">Phytosanitaire</option>
                                  <option value="Plomberie">Plomberie</option>
                                  <option value="Psychologie">Psychologie</option>
                                  <option value="Qualité">Qualité</option>
                                  <option value="Ressources Animales et Halieutiques">Ressources Animales et Halieutiques</option>
                                  <option value="Ressources Humaines">Ressources Humaines </option>
                                  <option value="Sciences halieutes">Sciences halieutes</option>
                                  <option value="Sciences politiques">Sciences politiques</option>
                                  <option value="Sciences sociales">Sciences sociales</option>
                                  <option value="Secrétariat">Secrétariat</option>
                                  <option value="Sécurité/Défense">Sécurité/Défense</option>
                                  <option value="Sociologie">Sociologie</option>
                                  <option value="Soudure">Soudure</option>
                                  <option value="Sports">Sports</option>
                                  <option value="Statistiques">Statistiques</option>
                                  <option value="Tapisserie">Tapisserie</option>
                                  <option value="Télécommunications">Télécommunications</option>
                                  <option value="Thermodynamique">Thermodynamique</option>
                                  <option value="Topographie">Topographie</option>
                                  <option value="Tourisme/Loisirs">Tourisme/Loisirs</option>
                                  <option value="Traduction/Interprétariat">Traduction/Interprétariat</option>
                                  <option value="Transit/Transport">Transit/Transport</option>
                                  <option value="Transport (Chauffeur)">Transport (Chauffeur)</option>
                                  <option value="Urbanisme">Urbanisme</option>
                                  <option value="Vitrerie">Vitrerie</option>
                                  <option value="Zootechnie">Zootechnie</option>
                    </select>
                  </div>
                  </div>
                  
                  
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Niveau(x) d'étude:</label>
                  <div class="col-sm-8">
                    <select name="niveaux[]" multiple id="select2" required>
                      <option value="BAC+7 et plus">BAC+7 et plus </option>
                                    <option value="BAC+6">BAC+6 </option>
                                    <option value="BAC+5">BAC+5 </option>
                                    <option value="BAC+4">BAC+4 </option>
                                    <option value="BAC+3">BAC+3 </option>
                                    <option value="BAC+2">BAC+2 </option>
                                    <option value="BAC+1">BAC+1 </option>
                                    <option value="BAC">BAC </option>
                                    <option value="BT">BT </option>
                                    <option value="Terminale">Terminale </option>
                                    <option value="Première">Première </option>
                                    <option value="Seconde">Seconde </option>
                                    <option value="BEPC">BEPC </option>
                                    <option value="BEP">BEP </option>
                                    <option value="BP">BP </option>
                                    <option value="Troisième">Troisième </option>
                                    <option value="Quatrième">Quatrième </option>
                                    <option value="Cinquième">Cinquième </option>
                                    <option value="Sixième">Sixième </option>
                                    <option value="CAP">CAP </option>
                                    <option value="CEPE">CEPE </option>
                                    <option value="CM2">CM2 </option>
                    </select>
                    </div>
                  </div>
                  
                  
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Expériences:</label>
                  <div class="col-sm-8" required>
                    <select name="experience"  id="select3">
                      <option value="aucune">Aucune</option>
                      <option value="1 an">1 an</option>
                      <option value="2 ans">2 ans</option>
                      <option value="3 ans">3 ans</option>
                      <option value="4 ans">4 ans</option>
                      <option value="5 ans">5 ans</option>
                      <option value="6 ans">6 ans</option>
                      <option value="7 ans">7 ans</option>
                      <option value="8 ans">8 ans</option>
                      <option value="9 ans">9 ans</option>
                      <option value="10 ans">10 ans</option>
                      <option value="11 ans">11 ans</option>
                      <option value="12 ans">12 ans</option>
                      <option value="13 ans">13 ans</option>
                      <option value="14 ans">14 ans</option>
                      <option value="15 ans">15 ans</option>
                      <option value="16 ans">16 ans</option>
                      <option value="17 ans">17 ans</option>
                      <option value="18 ans">18 ans</option>
                      <option value="19 ans">19 ans</option>
                      <option value="20 ans">20 ans</option>
                      <option value="21 ans">21 ans</option>
                      <option value="22 ans">22 ans</option>
                      <option value="23 ans">23 ans</option>
                      <option value="24 ans">24 ans</option>
                      <option value="25 ans">25 ans</option>
                      <option value="26 ans">26 ans</option>
                      <option value="27 ans">27 ans</option>
                      <option value="28 ans">28 ans</option>
                      <option value="29 ans">29 ans</option>
                      <option value="30 ans">30 ans</option>
                    </select>
                    </div>
                  </div>
                  
                  
                </div>


                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Lieu (Précision facultative):</label>
                  <div class="col-sm-8">
                    <input type="text" name="lieu" class="form-control" required>
                  </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Description du poste:</label>
                  <div class="col-sm-8">
                    <textarea name="description" class="form-control" required></textarea>
                  </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Profil du poste:</label>
                  <div class="col-sm-8">
                    <textarea name="profil" class="form-control" required></textarea>
                  </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Dossier et Email de candidature:</label>
                  <div class="col-sm-8">
                    <textarea name="candidature" class="form-control" required></textarea>
                  </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                   <label class="col-sm-3 control-label">Logo de l'entreprise:</label>
                  <div class="col-sm-8">
                    <input type="file" name="logo" required>
                  </div>
                  </div>
                </div>
                


                <div class="form-group">
                  <div class="row">
                   
                  <div class="col-sm-8">
                    <label class="col-sm-3 control-label"></label>
                    <button type="submit" class="btn btn-success" name="envoi">Enregistrer</button>
                  </div>
                  </div>
                  
                  
                </div>
    
              </form>
              
            </div>
            
        </div>
    </div>