<?php

include ('../controller/crudComment.php');
include ('../model/comments.php');
$Cr=new crudComment();

$responseC = $Cr->recupererComment($_POST['idC'], $Cr->conn);
$id_blog=$_POST['idblog'];

while ($row = $responseC->fetch()) {
    $comment=new comments($row['contenu_commentaire'],$id_blog);
    $comment->setIdComment($row['id_commentaire']);
    $comment->setContenuComment($row['contenu_commentaire']);
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
	<title>Edit Comment</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../assets/img/logo.png">
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
						<p>Edit Comment</p>
						<h1></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- single article section -->
	<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-article-section">

						<div class="comment-template">
							<h4>Edit the comment</h4>
							<p></p>
							<form action="../helpers/modifierComment.php" method="post">
								<!--<p>
									<input type="text" placeholder="Your Name">
								</p> -->
                                <input type="text" class="form-control" name="comment_id" value=<?php echo $comment->getIdComment(); ?> hidden >
                                <input type="text" class="form-control" name="blog_id" value=<?php echo $comment->getBlog(); ?> hidden >
				
								<p><textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Your Message"> <?php echo $comment->getContenuComment(); ?> </textarea></p>
								<p><input type="submit" value="Submit"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single article section -->

	<!-- logo carousel -->
	<?php 
	include_once('logo_carousel.php');
	?>
	<!-- end logo carousel -->

	<!-- footer -->
	<?php 
	include_once('footerBSession.php');
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
	<script src="../assets/js/dark.js"> </script>
	<script>
      new Darkmode({
        bottom: '32px',
        right: '32px',
        time: '0.5s',
        label: '🌓'
      }).showWidget();
    </script>

</body>
</html>