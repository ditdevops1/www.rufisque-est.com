<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1//css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"
    integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<?php


$db_user = "root";
$db_pass = "";
$db_name = "rufisque_est";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);


if($_POST){
    /*recupérer les données */

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
    /* insérer le mail dans la table newuser*/
    $sql = "INSERT INTO nouveau_ne (annee_dec,annee_naisse,jour_naisse,heure_naisse,lieu_naisse,sexe,prenom_nouvne,nom_nouvne,prenom_pere, prenom_mere, nom_mere, mois_naisse ) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([ $annee_dec,$annee_naiss,$jour_naiss,$heure_naiss,$lieu_naiss,$sexe,$prenom_bb,$nom_bb,$prenom_pere,$prenom_mere,$nom_mere,$mois_naiss]);
    if($result){
        $emp =  "<div class='alert-success p-4  mt-5 text-center' style='margin:0 auto; width:50%'> 
        <h4>  Déclaration a bien été ajouté !<h4> 
        <p>le déclaration du nouveau né : <strong>".$prenom_bb." ".$nom_bb." <\strong> a été validé avec success !<\p>
        <a href='index.html'><button class='btn btn-primary'> retourner </button></a>
        </div> ";
        echo $emp;
       
    }else{
        /*message d'erreur! */
        echo 'une erreur s\'est produit, merci de réessayer.';
      }
    }else{
    echo 'No data';
    }
?>

<!-- Fin Code php -->
