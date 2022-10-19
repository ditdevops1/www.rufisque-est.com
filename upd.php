<?php

$db_user = "root";
$db_pass = "";
$db_name = "rufisque_est";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);

$info = "";
if ($_POST) {
    if (!empty($_POST['prenom_nouvne']) && !empty($_POST['num_extrait'])) {
        $prenom_nouvne = $_POST['prenom_nouvne'];
        $num_extrait = $_POST['num_extrait'];
        $requete = "SELECT * FROM nouveau_ne WHERE prenom_nouvne = '$prenom_nouvne' AND num_extrait = '$num_extrait' ";
        $query = $db->prepare($requete);
        $query->execute();
        $row = $query->fetch();
        $info = "<div class='p-3'>
                    Modification de l'extrait <div>";
    }
    

}

?>
<head>
<link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<!--  demande d'état civil résidents-->
<body>
    <div class="container mt-3 shadow" style="background-color: whitesmoke;">
        <div class="text-center"><h3><?php echo $info ?></h3></div>
        <form class="form" role="form" action="save_upd.php" method="POST">
                <div class="row form-group">
                  <div class="form-group col-3">
                    <b>Numéro extrait : </b>
                  </div>
                  <div class="form-group col-1">
                    <input type="text" name="num_extrait" value="<?php echo  $row["num_extrait"] ?>" class="form-control" required >
                  </div>
                </div>
                <div class="form-group row">
                  <div class="form-group col-3">
                    <b>Année de déclaration :</b>
                  </div>
                  <div class="form-group col-3">
                    <select name="annee_dec" required class="form-control" >
                      <option value="<?php echo  $row["annee_dec"] ?>"><?php echo  $row["annee_dec"] ?>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                    </select>
                  </div>
                  <div class="form-group col-3">
                    <b>Année de naissance : </b>
                  </div>
                  <div class="form-group col-3">
                    <select  name="annee_naiss" class="form-control" required size="0">
                    <option value="<?php echo  $row["annee_naisse"] ?>"><?php echo  $row["annee_naisse"] ?>                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                    </select>
                  </div>
                </div><hr>
                
                <div class="form-group row">
                  <div class="form-group col-3">
                    <b>Mois de naissance : </b>
                  </div>
                  <div class="form-group col-3">
                    <select  name="mois_naiss" class="form-control" required size="0">
                      <option value="<?php echo  $row["mois_naisse"] ?>"><?php echo  $row["mois_naisse"] ?>                      
                      <option value="Janvier">Janvier</option>
                      <option value="Février">Février</option>
                      <option value="Mars">Mars</option>
                      <option value="Avril">Avril</option>
                      <option value="Mai">Mai</option>
                      <option value="Juin">Juin</option>
                      <option value="Juillet">Juillet</option>
                      <option value="Aout">Aout</option>
                      <option value="Septembre">Septembre</option>
                      <option value="Octobre">Octobre</option>
                      <option value="Novembre">Novembre</option>
                      <option value="Décembre">Décembre</option>
                    </select>
                  </div>
                  <div class="form-group col-3">
                    <b>Jour de naissance : </b>
                  </div>
                  <div class="form-group col-3">
                    <select  name="jour_naiss" class="form-control" required size="0">
                    <option value="<?php echo  $row["jour_naisse"] ?>"><?php echo  $row["jour_naisse"] ?>                      
                      <option value="Lundi">Lundi</option>
                      <option value="Mardi">Mardi</option>
                      <option value="Mercredi">Mercredi</option>
                      <option value="Jeudi">Jeudi</option>
                      <option value="Vendredi">Vendredi</option>
                      <option value="Samedi">Samedi</option>
                      <option value="Dimanche">Dimanche</option>
                    </select>
                  </div>
                </div><hr>
                <div class="row form-group">
                  <div class="form-group col-3">
                    <b>Heure de Naissance : </b>
                  </div>
                  <div class="form-group col-3">
                    <input type="text" name="heure_naiss" value="<?php echo  $row["heure_naisse"] ?>" class="form-control" required >
                  </div>
                  <div class="form-group col-3">
                    <b>Lieu de Naissance : </b>
                  </div>
                  <div class="form-group col-3">
                    <input type="text" value="<?php echo  $row["lieu_naisse"] ?>" name="lieu_naiss" class="form-control" required >
                  </div>
                </div>
                <hr>
                <div class="row form-group">
                  <div class="form-group col-3">
                    <b>Sexe du bébé : </b>
                  </div>
                  <div class="form-group col-3">
                    <select  name="sexe" class="form-control" required size="0">
                    <option value="<?php echo  $row["sexe"] ?>"><?php echo  $row["sexe"] ?>                      
                      <option value="Masculin">Masculin</option>
                      <option value="Féminin">Féminin</option>
                    </select>
                  </div>
                  <div class="form-group col-3">
                    <b>Prénom du père : </b>
                  </div>
                  <div class="form-group col-3">
                    <input type="text" value="<?php echo  $row["prenom_pere"] ?>" name="prenom_pere" class="form-control" required >
                  </div>
                </div>
                <hr>
                <div class="row form-group">
                  <div class="form-group col-3">
                    <b>Prénom du bébé : </b>
                  </div>
                  <div class="form-group col-3">
                    <input type="text" value="<?php echo  $row["prenom_nouvne"] ?>" name="prenom_bb" class="form-control" required >
                  </div>
                  <div class="form-group col-3">
                    <b>Nom du bébé : </b>
                  </div>
                  <div class="form-group col-3">
                    <input type="text"  value="<?php echo  $row["nom_nouvne"] ?>" name="nom_bb" class="form-control" required >
                  </div>
                </div>
                <hr>
                <div class="row form-group">
                  <div class="form-group col-3">
                    <b>Prénom du mère : </b>
                  </div>
                  <div class="form-group col-3">
                    <input type="text" value="<?php echo  $row["prenom_mere"] ?>" name="prenom_mere" class="form-control" required >
                  </div>
                  <div class="form-group col-3">
                    <b>Nom du mère : </b>
                  </div>
                  <div class="form-group col-3">
                    <input type="text" value="<?php echo  $row["nom_mere"] ?>" name="nom_mere" class="form-control" required >
                  </div>
                </div>
                <div class="modal-footer justify-content-center">
                  <a href="index.html"><button type="button" class="btn btn-danger" data-dismiss="modal" class="btn btn-secondary">x Annuler </button></a>
                  <button class="btn btn-success" type="submit">Valider</button>
                </div>
              </form>
    </div>
   
</body>