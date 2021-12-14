<?php 

include ('../controller/crudBlog.php');
include ('../model/blogs.php');
$crudSearch= new crudBlog();
$responseR= $crudSearch->resultatRecherche($_POST['search'],$crudSearch->conn);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>News</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
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
	include_once('header.php');
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
						<p>Search Result for: </p>
						<h1><?php echo $_POST['search']; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
			
			<?php 
			while($row = $responseR->fetch())
			{
			?>
             <div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.php?id=<?php echo $row["id_blog"] ?>" ><div class="latest-news-bg "> <img class="latest-news-bg " src=<?php echo $row["image_blog"] ?> > </div></a> <!-- afficher image -->
						<div class="news-text-box">
							<h3><a href="single-news.php?id=<?php echo $row["id_blog"] ?>"> <?php echo $row['nom_blog'] ?>   </a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> <?php echo $row['date_blog'] ?>  </span>
							</p>
							<p class="excerpt"> <?php echo $row['contenu_blog'] ?> </p>
							<a href="single-news.php?id=<?php echo $row["id_blog"] ?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
            <?php
			}	
			?>
            
			
				
			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

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