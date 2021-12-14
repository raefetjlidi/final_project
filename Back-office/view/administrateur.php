<?php
include "../Controller/UserC.php";
require_once '../Model/User.php';
session_start();
//$email= $_SESSION['email'];
//$pass= $_SESSION['mot_de_passe'];

$UserC = new clientC();
$Admin = $UserC->afficherAdmin();
$trie = $_POST['trie'];
if (isset($_POST['supprimer'])) {
    $Admin = $UserC->supprimerUt($_POST['Email']);
    header('Location:administrateur.php');
    $Admin = $UserC->afficherAdmin();
}
if (isset($_POST['trie1'])) {

    $Admin = $UserC->trierAdmin($trie);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="logo 2.png" />
</head>


<body>
    <div class="container-scroller">
        <!-- _navbar.php -->
        <?php
        include_once('_navbar.php');
        ?>
        <!-- end _navbar.php -->

        <div class="container-fluid page-body-wrapper">
            <!-- _settings-panel.php -->
            <?php
            include_once('_settings-panel.php');
            ?>
            <!-- end _settings-panel.php -->

            <!-- _sidebar.php -->
            <?php
            include_once('_sidebar.php');
            ?>
            <!-- end _sidebar.php -->

            <!-- content-wrapper -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                                    Administrateur
                                </div>
                                <p>
                                <form method="POST" action="">
                                    <select name="trie" id="trie" class="btn btn-success">
                                        <option value="Nom">Nom</option>
                                        <option value="Prenom">Prenom</option>

                                    </select>
                                    <input type="submit" name="trie1" value="trier" class="btn btn-success">
                                </form>
                                </p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Advanced Tables -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h2>Liste des administrateurs</h2>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                        <tr>

                                                            <th>Nom</th>
                                                            <th>Prenom</th>
                                                            <th>Email</th>
                                                            <th>Mot de passe </th>
                                                            <th>Numéro de téléphone</th>
                                                        </tr>


                                                        <?php
                                                        foreach ($Admin as $liste) {

                                                        ?>
                                                            <tr>
                                                               
                                                                <td> <?php echo $liste['Nom'] ?> </td>
                                                                <td> <?php echo $liste['Prenom'] ?> </td>
                                                                <td> <?php echo $liste['Email'] ?> </td>
                                                           
                                                                <td> <?php echo $liste['MDP'] ?> </td>
                                                                <td> <?php echo $liste['Num'] ?> </td>
                                                                <td>
                                                                    <form method="POST" action="">
                                                                        <input type="submit" name="supprimer" value="Bloquer" class="btn btn-success" >
                                                        <input type=" hidden" value="<?PHP echo $liste['Email']; ?>" name="Email">
                                                                    </form>
                                                                </td>
                                                                <?php
                                                                if ($liste['Email'] == $_SESSION['Email']) {
                                                                ?>
                                                                    <td>
                                                                        <form method="POST" action="">
                                                                            <a type="button" class="btn btn-success" href="ModifierUsers.php">Modifier </a>
                                                                        </form>
                                                                    </td>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <a type="button" class="btn btn-success" href="add_admin.php">Ajouter Administrateur</a>
                            </div>
                            </main>
                                <!-- content-wrapper ends -->
    <!-- _footer.php -->
        <?php 
        include_once('footer.php');
        ?>
    <!-- end footer.php -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/template.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>