<?php
 
session_start();
include_once('../controller/userC.php');
include_once('../model/user.php');
$test=0;

require_once '../config/connexionS.php';
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
					header("Location:indexSession.php");
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
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Register</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="logo 2.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../assets/css/responsive.css">

</head>

<body>

	<!--PreLoader-->
	<?php
	include_once('preloader.php');
	?>
	<!--PreLoader Ends-->

	<!-- header -->
	<?php
	include_once('headerBSession.php');
	?>
	<!-- end header -->

	<!-- search area -->
	<?php
	include_once('search_area.php');
	?>
	<!-- end search arewa -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p></p>
						<h1>Login Now</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<div class="comment-form">
		<p></p>
		<form action="login.php" method="post" class="bg-light mx-auto mw-430 radius10 pt-40 px-50 pb-30">
			<h3 class="mb-40 small text-center" d>Login</h3>
			<p class="mt-4 text-sm text-center">
				<input type="email" placeholder="Your Email" name="Email" class="input border-gray focus-action-1 color-heading placeholder-heading w-full text-center" required>
			<p class="mt-4 text-sm text-center">
				<br>
				<input type="password" placeholder="Your Password" minlength="8" name="MDP" class="input border-gray focus-action-1 color-heading placeholder-heading w-full text-center" required>
			<p class="mt-4 text-sm text-center">
			<p class="mt-4 text-sm text-center">
				<input class="form-check-input" type="checkbox" id="rememberMe">
				<label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
	</div>
	<p class="mt-4 text-sm text-center">
		<input type="submit" name="Login" id="submitButton" value="LOGIN" class="mt-25 btn action-1 w-full text-center">
	<p class="mt-4 text-sm text-center">
		Don't have an account?
		<a href="register.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
	</p>
	<!--   <input type="image" name="submit" id="submit" src="../i/google.png" height="50" width="330"   onclick ="window.location ='<?php echo $login_url; ?>'">-->

	</form>
	</div>
	</div>
	<!-- logo carousel -->
	<?php
	include_once('logo_carousel.php');
	?>
	<!-- end logo carousel -->

	<!-- footer -->
	<?php
	include_once('footer.php');
	?>
	<!-- end footer -->

	<!-- copyright -->
	<?php
	include_once('copyright.php');
	?>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="../assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="../assets/js/main.js"></script>

</body>

</html>