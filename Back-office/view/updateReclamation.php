<?php 

   include_once '../model/reclamation.php';
   include_once '../controller/reclamationC.php';
      $id = null; 
      $reclamation = null;  
      $reclamationC = new reclamationC();
      
    { $id = $_REQUEST['id']; } 

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { 
      $nomError = null; 
      $phoneError = null; 
      $subjectError = null; 
      $emailError = null;
      $explicationError = null;
      
// On assigne nos valeurs


       $name = $_POST['name']; 
       $phone = $_POST['phone']; 
         $subject = $_POST['subject']; 
         $email = $_POST['email'];
         $explication = $_POST['explication'];
         // On verifie que les champs sont remplis 
         $valider = true;     
         
         if (empty($name)) { $nomError = 'Please enter nom'; $valider = false; }
          if (empty($phone)) { $phoneError = 'Please enter your phone'; $valider = false; } 
          if (empty($email)) { $emailError = 'Please enter email$email'; $valider = false; }  
          if  (empty($subject)){ $subjectError = 'Please enter website subject'; $valider = false; } 
          if (empty($explication)) { $explicationError = 'Please enter explication'; $valider = false; } 
         // mise à jour des donnés   
         if ($valider) {
             
            
            $reclamation = new reclamation(                   
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['subject'],             
                $_POST['explication']
            );
            $reclamationC->updateReclamation($reclamation,$id);        
 
    
             
         } 
        }else {
            
            $pdo = configC::getConnexion();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "SELECT * FROM reclamation where id = ?";
             $q = $pdo->prepare($sql);
             $q->execute(array($id));
             $data = $q->fetch(PDO::FETCH_ASSOC);

             $name = $data['name'];
             $email = $data['email'];
             $phone = $data['phone'];
             $subject = $data['subject'];
             $explication = $data['explication'];
            
             configC::disconnect();
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
                          Update Reclamation
                    </div>

                    <div class="row" style="margin-left: 30%; width:100%">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                     
                                <form method="post" action="updateReclamation.php?id=<?php echo $id ;?>">

                    <div class="control-group <?php echo!empty($nomError) ? 'error' : ''; ?>">
                    <label class="control-label">Nom</label>

                         <div class="controls">
                        <input class="form-control w-25" name="name" type="text"  placeholder="nom" value="<?php echo!empty($name) ? $name : ''; ?>">
                        <?php if (!empty($nomError)): ?>
                            <span class="help-inline"><?php echo $nomError; ?></span>
                        <?php endif; ?>
                         </div>
<p>

</div>
<p>

<div class="control-group<?php echo!empty($phoneError) ? 'error' : ''; ?>">
                    <label class="control-label">Tél</label>

<br />
<div class="controls">
                        <input class="form-control w-25" type="text" name="phone" value="<?php echo!empty($phone) ? $phone : ''; ?>">
                        <?php if (!empty($phoneError)): ?>
                            <span class="help-inline"><?php echo $phoneError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>
<br />
<div class="control-group <?php echo!empty($subject) ? 'error' : ''; ?>">
                    <label class="control-label">Sujet</label>
 <br />
<div class="controls">
                        <input class="form-control w-25" type="text" name="subject" value="<?php echo!empty($subject) ? $subject : ''; ?>">
                        <?php if (!empty($subjectError)): ?>
                            <span class="help-inline"><?php echo $subjectError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>
<br />
<div class="control-group  <?php echo!empty($emailError) ? 'error' : ''; ?>">
                    <label class="control-label">Email </label>

<br />
<div class="controls">
                        <input class="form-control w-25" name="email" type="text" placeholder="Email Address" value="<?php echo!empty($email) ? $email : ''; ?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo $emailError; ?></span>
                        <?php endif; ?>
</div>

<p>

</div>
<br />

<div class="control-group">

<label>Type</label>
 <select class="form-control w-25" name="type" id="type">
     <option value="Demande_Divers">Demande Divers</option>
     <option value="Reclamation">Réclamation</option>
     <option value="Demande_devis">Demande devis</option>

 </select>
</div>
</div>
<div class="controls mt-5">
                           <label>Explication</label>
                        <input class="form-control w-25" name="explication" type="text" placeholder="explication" value="<?php echo!empty($explication) ? $explication : ''; ?>">
                        <?php if (!empty($explicationError)): ?>
                            <span class="help-inline"><?php echo $explicationError; ?></span>
                        <?php endif; ?>
</div>

<p>
<p>
<br />
<p>
    


<br />
<div class="form-actions m-5">
                    <input type="submit" class="btn btn-success"  >
                    <a class="btn" href="afficherListeReclamation.php">Retour</a>
</div>
<p>

            </form>


                                </div>
                            </div>
                        </div>
           
                </div>
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