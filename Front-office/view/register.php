<?php
session_start();
include('../controller/userC.php');
include('../model/user.php');
include('../config/connexionS.php');
$clientC= new clientC();
if (isset ($_POST["Email"])){
	$Email=$_POST["Email"];
	$pdo=getConnexion();
	try{
	$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE EmailDeConfirmation=?");
	$stmt->execute([$Email]); 
	$user = $stmt->fetch();
	if ($user) {
        echo("You have to try with another email!!!");
        header('Location: register.php');
    }

    else
    {   $nom=$_POST['Nom'];
        $prenom=$_POST['Prenom'];
        $email=$_POST['Email'];
        $pass=$_POST['MDP'];
        $numTel=$_POST['Num'];
        $sexe=$_POST['Sexe'];
        $roleU= '0';

        $client= new client($nom,$prenom,$email,$pass,$numTel,$roleU,$sexe);
$clientC->ajouterClient($client);
header('Location: indexSession.php');
$_SESSION['e']=$_POST["Email"];
    }
}

catch (Exception $e){
	die('Erreur: '.$e->getMessage());
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
						<h1>Welcome to "GALEXY Invaders" But first, you have to create an account to continue ..</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<div class="comment-template">
		<h4 class="mt-7 text-sm text-center" d>Register</h4>
		<p></p>
		<form action="../helpers/add_user.php" method="POST">

			<p class="mt-7 text-sm text-center">
				<input type="text" name="Nom" placeholder="Your First Name">
			</p>
			<p class="mt-7 text-sm text-center">
				<input type="text" name="Prenom" placeholder="Your Last Name">
			</p>
			<p class="mt-7 text-sm text-center">
				<input type="email" name="Email" placeholder="Your Email">
			</p>
			</p>
			<p class="mt-7 text-sm text-center">
				<input type="password" name="MDP" placeholder="Your Password">
			</p>
			<p class="mt-7 text-sm text-center">
				<input type="text" name="Num" placeholder="Your Phone Number">
			</p>
			<p class="mt-7 text-sm text-center">
				<select name="Sexe" id="Sexe">
					<option value="">--Please choose your sex--</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<br>
			</p>
			<p class="mt-7 text-sm text-center">
				<input type="submit" name="Login" id="submitButton" value="Submit" class="mt-25 btn action-1 w-full text-center">
			</p>
		</form>

		<!--
            ---------------------------------------------------------------------------
                            /* php hetha
$email = "Email";
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE EmailDeConfirmation=?");
$stmt->execute([$email]); 
$client = $stmt->fetch();
if ($user) {
  //  Email Existant !!! try with another Email
  //go back to register page 
    // email existe
} else {
    // email n'existe pas
       // submited with success, you should login now 
       // go to the main page to do the login or go to login.php} 
}
*/
?>
--------------------------------------------------------------------------------
                             -->
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