<?php
 
session_start();
include_once('../controller/userC.php');
include_once('../model/user.php');
$test=0;

require_once '../config/connexion.php';
if (isset($_POST["Email"])) {
	$Email = $_POST["Email"];
	$pdo = getConnexion();
	try {
		$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE EmailDeConfirmation=?");
		$stmt->execute([$Email]);
		$user = $stmt->fetch();
		if ($user) {
			if (isset($_POST["MDP"])) {
				$pass = $_POST["MDP"];
				$stmt2 = $pdo->prepare("SELECT * FROM utilisateur WHERE MDP=?");
				$stmt2->execute([$pass]);
				$pass = $stmt2->fetch();
				if ($pass) {
					header("Location:indexP.php");
					$_SESSION['Email']=$_POST['Email'];
				} else
					echo ("votre compte n'est pas activé pour le moment .Vous devez vérifier votre mail et ouvrir le lien de vérification .");
			}
		} else 
			echo ("votre compte n'est pas activé pour le moment .Vous devez vérifier votre mail et ouvrir le lien de vérification .");
		
	} catch (Exception $e) {
		die('Erreur: ' . $e->getMessage());
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Admin Login :  </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="logo 2.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="logo 2.png" alt="">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <form  method="post" class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="Email" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="MDP" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                <p class="mt-4 text-sm text-center">
            	<input type="submit" name="Login" id="submitButton" value="LOGIN" class="mt-25 btn action-1 w-full text-center">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook me-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="add_admin.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/template.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>