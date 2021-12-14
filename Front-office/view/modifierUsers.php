<?php
require_once '../Controller/UserC.php';
require_once '../Model/User.php';
require '../helpers/add_user.php';

session_start();
$email= $_SESSION['Email'];

$UserC = new clientC();
$User = $UserC->getClient($email);

foreach ($User as $user) {
    $id = $user['idUt'];

if (isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Email']) && isset($_POST['RoleU']) && isset($_POST['MDP']) && isset($_POST['Sexe'])&&isset($_POST['Num']) ) {
    ($role == 0);
    $User = new client($_POST['Nom'], $_POST['Prenom'], $_POST['Email'], $_POST['MDP'], $_POST['Num'], $_POST[$role], $_POST['Sexe']);

    $UserC->modifierClient($User,$id);
    header('Location:afficheUser.php');
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
	<title>Galaxy Invaders</title>

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
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="indexSession.php">
								<img src="../assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->
						

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a>
									<ul class="sub-menu">
										<li><a href="indexSession.php">Static Home</a></li>
										<li><a href="afficheUser.php">Profil</a></li>
                                        <li><a href="modifierUsers.php">Edit Profile</a></li>
									</ul>
								</li>
								<li><a href="about.php">About</a></li>
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.php">404 page</a></li>
										<li><a href="about.php">About</a></li>
										<li><a href="cart.php">Cart</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="contact.php">Contact</a></li>
										<li><a href="news.php">News</a></li>
										<li><a href="shop.php">Shop</a></li>
										<li><a href="index_2.php">Logout</a></li>
									</ul>
								</li>
								
								<li><a href="news.php">News</a>
									<ul class="sub-menu">
										<li><a href="news.php">News</a></li>
										<li><a href="single-news.php">Single News</a></li>
									</ul>
								</li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="shop.php">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.php">Shop</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="single-product.php">Single Product</a></li>
										<li><a href="cart.php">Cart</a></li>
									</ul>
								</li>
								<li> 
									<a href="index_2.php">Logout</a>
								</li>
								<li>
							
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<br>
								<h4> WELCOME TO YOUR PERSONNAL ACCOUNT </h4>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
    <section class="form_1 pt-120 pb-120">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <h4 class="panel-title">Profile</h4>
                    </div>
                    <br>
                    <div class="panel-body">
                        <div class="row">


                            <?php
                            foreach ($User as $liste)
                            {

                            ?>
                            <div class="col-md-3 col-lg-3> "></div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $liste['Sexe'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <a href="<?php echo $liste['Email'] ?>"><?php echo $liste['Email'] ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td><?php echo $liste['Num'] ?>
                                        </td>
                                     </tr>
                                     <?php
                            }
                            ?>
                            </tbody>
                            </table>
                            <a href="modifierUsers.php" class="btn btn-primary">Edit Profile</a>
                                <a href="AfficheWishList.php" class="btn btn-primary">Wish List</a>
                            </div>