

<?php
  include "../controller/reclamationC.php";
  $reclamation = new reclamationC();
  $resultat=$reclamation->afficherReclamation();
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
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                                        </li>
                                    </ul>

                                    <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Code Brewers
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>


            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
					 Reclamation
                    </div>
         
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
								Gestion des Reclamtions
                                </div>
								<div class="panel-body">
                                           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <tr>
												<th>ID</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Télephone</th>
                                                <th>Type </th>
                                                <th>Sujet</th>
                                                <th>Explication</th>
                                                <th colspan="3"></th>
											
                                            </tr>


											<?php //on inclut notre fichier de connection $pdo = Database::connect(); //on se connecte à la base $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                    
						  require_once("../Controller/reclamationC.php");

                         $reclamation = new reclamationC();
                         $resultat=$reclamation->afficherReclamation();
    
   

                           
                         foreach($resultat as $row) {

                            echo'
							<td>' . $row['id'] . '</td>
                            <p>
                            ';

 							echo'
                            <td>' . $row['name'] . '</td>
                            <p>
                            ';
                                                        echo'
                            
                            <td>' . $row['email'] . '</td>
                            <p>
                            ';
                                                        echo'
                            
                            <td>' . $row['phone'] . '</td>
                            <p>
                            ';

							echo'
                            
                            <td>' . $row['type'] . '</td>
                            <p>
                            ';
                                                       
                                                        echo'
                            
                            <td>' . $row['subject'] . '</td>
                            <p>
                            ';
							echo'
                            
                            <td>' . $row['explication'] . '</td>
                            <p>
                            ';

									
                                                      
                                                        echo '
                            
                            <td>';
                                                        echo '<a class="btn btn-primary" href="editer.php?id=' . $row['id'] . '">Read</a>';// un autre td pour le bouton d'edition
                                                        echo '</td>
                            <p>
                            ';
                                                        echo '
                            
                            <td>';
                                                        echo '<a class="btn btn-success" href="updateReclamation.php?id=' . $row['id'] . '">Update</a>';// un autre td pour le bouton d'update
                                                        echo '</td>
                            <p>
                            ';
                                                        echo'
                            
                            <td>';
                                                        echo '<a class="btn btn-danger" href="SupprimerReclamation.php?id=' . $row['id'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
                                                        echo '</td>
                            <p>
                            ';
                                                        echo '</tr>
                            <p>
                            ';
                            
}      
?>

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
        </main>

    <!-- content-wrapper ends -->
    <!-- _footer.php -->
    <?php 
        include_once('_footer.php');
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




 