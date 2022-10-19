<?php


$db_user = "root";
$db_pass = "";
$db_name = "rufisque_est";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);


if($_POST){
    /*recupérer les données */
    $num_extrait = $_POST['num_extrait'];
    $annee_dec = $_POST['annee_dec'];
    $annee_naiss = $_POST['annee_naiss'];
    $mois_naiss = $_POST['mois_naiss'];
    $jour_naiss = $_POST['jour_naiss'];
    $heure_naiss = $_POST['heure_naiss'];
    $lieu_naiss = $_POST['lieu_naiss'];
    $sexe = $_POST['sexe'];
    $prenom_pere = $_POST['prenom_pere'];
    $prenom_bb = $_POST['prenom_bb'];
    $nom_bb = $_POST['nom_bb'];
    $prenom_mere = $_POST['prenom_mere'];
    $nom_mere = $_POST['nom_mere'];
    $emp ="";
    $reponse = $db->query('SELECT * FROM nouveau_ne');
    $donnees = $reponse->fetch();

    if (isset($_POST['num_extrait']) AND $_POST['num_extrait'] != $donnees['num_extrait'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `num_extrait` =  '".$num_extrait."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

    if (isset($_POST['annee_dec']) AND $_POST['annee_dec'] != $donnees['annee_dec'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `annee_dec` =  '".$annee_dec."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }
      
      if (isset($_POST['annee_naiss']) AND $_POST['annee_naiss'] != $donnees['annee_naisse'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `annee_naisse` =  '".$annee_naiss."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['mois_naiss']) AND $_POST['mois_naiss'] != $donnees['mois_naisse'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `mois_naisse` =  '".$mois_naiss."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['jour_naiss']) AND $_POST['jour_naiss'] != $donnees['jour_naisse'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `jour_naisse` =  '".$jour_naiss."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['heure_naiss']) AND $_POST['heure_naiss'] != $donnees['heure_naisse'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `heure_naisse` =  '".$heure_naiss."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['lieu_naiss']) AND $_POST['lieu_naiss'] != $donnees['lieu_naisse'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `lieu_naisse` =  '".$lieu_naiss."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['sexe']) AND $_POST['sexe'] != $donnees['sexe'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `sexe` =  '".$sexe."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['prenom_pere']) AND $_POST['prenom_pere'] != $donnees['prenom_pere'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `prenom_pere` =  '".$prenom_pere."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['prenom_bb']) AND $_POST['prenom_bb'] != $donnees['prenom_nouvne'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `prenom_nouvne` =  '".$prenom_bb."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['prenom_bb']) AND $_POST['prenom_bb'] != $donnees['nom_nouvne'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `nom_nouvne` =  '".$prenom_bb."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['prenom_mere']) AND $_POST['prenom_mere'] != $donnees['prenom_mere'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `prenom_mere` =  '".$prenom_mere."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

      if (isset($_POST['nom_mere']) AND $_POST['nom_mere'] != $donnees['nom_mere'] ) {
        $query = $db->prepare("UPDATE  `nouveau_ne` SET  `nom_mere` =  '".$nom_mere."' WHERE  `num_extrait` =  '".$donnees["num_extrait"]."'LIMIT 1");
        $query->execute(); 
      }

            echo '<script>
                    alert("Votre modifcation a bien été prise en compte");
                </script>';

  
      header('Location:index.html');
    }
?>