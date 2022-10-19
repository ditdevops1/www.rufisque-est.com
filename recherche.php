<?php
$db_user = "root";
$db_pass = "";
$db_name = "rufisque_est";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$info = "";
if ($_POST) {
    if (!empty($_POST['annee_naiss']) && !empty($_POST['num_extrait'])) {
        $annee_naiss = $_POST['annee_naiss'];
        $num_extrait = $_POST['num_extrait'];
        $reponse = $db->query("SELECT * FROM nouveau_ne WHERE num_extrait ='$num_extrait' and annee_naisse = '$annee_naiss'");
        $reponse2 = $db->query("SELECT * FROM nouveau_ne WHERE num_extrait ='$num_extrait' and annee_naisse = '$annee_naiss'");
        $info = "<div class='p-3 alert-success rounded '>
                    Résultat de l'extrait N° : <b>" . $num_extrait . " de l'année : " . $annee_naiss . "
                 <div>";
        $rslt = $reponse2->fetch();
        if ($rslt['num_extrait'] == "" & $rslt['annee_naisse'] == "") {
            $info =  "<div class='alert-danger p-4'> 
                     <h4> Cet extrait n'existe pas encors !<h4> 
                     </div> ";
        }
    }


    elseif (!empty($_POST['annee_naiss']) || !empty($_POST['num_extrait'])) {
         $annee_naiss = $_POST['annee_naiss'];
        $num_extrait = $_POST['num_extrait'];
        $reponse = $db->query("SELECT * FROM nouveau_ne WHERE num_extrait ='$num_extrait' || annee_naisse = '$annee_naiss'");
        $reponse2 = $db->query("SELECT * FROM nouveau_ne WHERE num_extrait ='$num_extrait' || annee_naisse = '$annee_naiss'");
        $info = "<div class='p-3 alert-success rounded '>
                    Résultat de l'extrait N° : <b>" . $num_extrait . " de l'année : " . $annee_naiss . "
                 <div>";
        $rslt = $reponse2->fetch();
        if ($rslt['num_extrait'] == "" & $rslt['annee_naisse'] == "") {
            $info =  "<div class='alert-danger p-4'> 
                     <h4> Cet extrait n'existe pas encors !<h4> 
                     </div> ";
        }
    }
}

?>

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1//css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex justify-content-between mt-2 mb-4 ml-3 p-4" style="background-color: whitesmoke;">
        <a href="index.html"><button id="inscription" class="btn btn-success shadow"> Retourner</button></a>
        <h1 class="h3 mb-0 "> <?php echo  $info ?> </h1>
        <i class="fas fa-users fa-2x text-gray-500"></i>

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary p-3" style="color:black;text-align: center;">
                        <tr>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Date de naissance</th>
                            <th>Lieu de Naissance</th>
                            <th>Numéro d'extrait</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <?php
                            // On affiche chaque entrée une à une
                            while ($donnees = $reponse->fetch()) {
                            ?>
                                <td><?php echo $donnees['prenom_nouvne']; ?></td>
                                <td><?php echo $donnees['nom_nouvne']; ?></td>
                                <td><?php echo $donnees['annee_naisse']; ?></td>
                                <td><?php echo $donnees['lieu_naisse']; ?></td>
                                <td><?php echo $donnees['num_extrait']; ?></td>
                                <td style="display:flex;" class="justify-content-center">
                                    <?php
                                    echo "<!-- Bouton Detail envoie le numextrait et prenombb
                                                        de l'étudiant à la page details.php -->
                                                       <form action='details.php' method='post' formtarget=\"_blank\">
                                                         <input type='hidden' name='num_extrait' value='" . $donnees['num_extrait'] . "' />
                                                         <input type='hidden' name='prenom_nouvne' value='" . $donnees['prenom_nouvne'] . "' />
                                                         <button class='btn btn-success' type='submit'>
                                                         <i class='fas fa-eye'  type='button'></i></button>
                                                        </form>
                                                        
                                                        <form action='upd.php' method='post'>
                                                         <input type='hidden'name='num_extrait' value='" . $donnees['num_extrait'] . "'/>
                                                         <input type='hidden' name='prenom_nouvne' value='" . $donnees['prenom_nouvne'] . "'/>
                                                         <button style='margin-left:5px'  type='submit' class='btn btn-warning'>
                                                         <i class='fas fa-edit'  type='button'></i></button>
                                                         </form>
                                                         <button  class='btn btn-danger' onclick='maFonction()'>
                                                         <i class='fas fa-ban' type='button'></i></button>";
                                    ?>


                                </td>
                        </tr>
                        <script>
                            function maFonction() {
                                if (confirm("Voulez vous faire cette suppression ?")) {
                                    window.location.replace("sup.php?id=<?php echo $donnees['num_extrait']; ?>");
                                }
                            }
                        </script>

                    <?php
                            }

                            $reponse->closeCursor(); // Termine le traitement de la requête

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>