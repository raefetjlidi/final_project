<?php
    //Blogs
	include ('../controller/crudBlog.php');
	include ('../model/blogs.php');
	$crud = new crudBlog();
	$responseS= $crud->recupererBlog($_GET['id'] ,$crud->conn);
	$id=$_GET['id'];
	
	// Recent Posts
	$crudRP = new crudBlog();
	$responseRP = $crudRP->afficherRecent($crud->conn);

	//Comments
	include ('../controller/crudComment.php');
	include ('../model/comments.php');
	$crudC= new crudComment();
	$responseC= $crudC->afficherComment($id, $crudC->conn);
	
	 $nbr_comment = $crudC->nb_comment($id,$crudC->conn);


	//Categorie
	$crudCat= new crudBlog();
	$responseCateg= $crud->recupererBlog($_GET['id'] ,$crud->conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Single News</title>

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
						<p>Read the Details</p>
						<h1>Single Article</h1>
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
					<?php 
			            while($row = $responseS->fetch())
			            {
			            ?>
					    <div class="single-article-text">
							<div class=""> <img src="<?php echo $row["image_blog"] ?>"> </div> <!-- <div class="single-artcile-bg"> -->
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> <?php echo $row['date_blog'] ?> </span>
							</p>
							<h2> <?php echo $row['nom_blog'] ?> </h2>
							<p> <?php echo $row['contenu_blog'] ?> </p>
						</div>

						<?php 
						}
						?>
                        <div class="comments-list-wrap">
                           <h3 class="comment-count-title">
							   
						<?php echo $nbr_comment ?>  Comments</h3>
					    </div>   
                           <?php
						    while($rowC= $responseC->fetch())
						    {
					        ?>
						
							
							<div class="comment-list">
								<div class="single-comment-body">
									<div class="comment-user-avater">
										<img src="../assets/img/avaters/avatar1.png" alt="">
									</div>
									<div class="comment-text-body">
										<h4>User name <span class="comment-date"> <?php echo $rowC['date_commentaire'] ?> </span>  <a href="#">reply</a>  
							
								        <form method="POST" action="../helpers/supprimerComment.php">
											<input type="submit" value="delete" style="background-color:transparent; "></input>
									        <input type="hidden" value="<?PHP echo $rowC['id_commentaire']; ?>" name="idc" >
									        <input type="hidden" name="idblog" id="idblog" value="<?php echo $id ?>">
											<!-- <a href="update_comment.php?idC=<?php echo $rowC['id_commentaire'] ?>">DELETE</a> -->					
								        </form>

								        <form method="POST" action="update_comment.php" >
											<input type="submit" value="EDIT" style="background-color:transparent;"></input>
									        <input type="hidden" value="<?PHP echo $rowC['id_commentaire']; ?>" name="idC" id="idC" >
									        <input type="hidden" name="idblog" id="idblog" value="<?php echo $id ?>">
                                            <!-- <a href="update_comment.php?idC=<?php echo $rowC['id_commentaire'] ?>">EDIT</a> -->
										</form>
									    


									    </h4>
										<p> <?php echo $rowC['contenu_commentaire'] ?> </p>
									</div>
									<!--<div class="single-comment-body child">
										<div class="comment-user-avater">
											<img src="../assets/img/avaters/avatar3.png" alt="">
										</div>
										<div class="comment-text-body">
											<h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
											<p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
										</div>
									</div> -->
								</div>
							</div>
						
						<?php 
					    } 
                        ?>

						<div class="comment-template">
							<h4>Leave a comment</h4>
							<p>If you have a comment, don't hesitate to send us your opinion.</p>
							<form action="../helpers/ajouterComment.php" method="post">
								<!--<p>
									<input type="text" placeholder="Your Name">
								</p> -->
								<p><textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Your Message"></textarea></p>
								<input type="hidden" name="idblog" id="idblog" value="<?php echo $id ?>">					
								<p><input type="submit" value="Submit"></p>
							</form>

						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-section">
						<div class="recent-posts">
							<h4>Recent Posts</h4>
							<?php 
							while($rowRP= $responseRP->fetch())
							{
							?>
							<ul>
								<li><a href="single-news.php?id=<?php echo $rowRP["id_blog"] ?>"> <?php echo $rowRP['nom_blog'] ?> .</a></li>
							</ul>
							<?php
							}
							?>
						</div>

						<div class="tag-section">
							<h4>Categorie</h4>
							<?php
							while($rowCateg = $responseCateg->fetch())
							{
							?>
							<ul>
								<!-- <li><a href="categorie.php?categ= <?php echo $rowCateg['categorie_blog'] ?>"> <?php echo $rowCateg['categorie_blog']  ?></a></li> -->

								<form method="POST" action="categorie.php">
									<li>
									<input type="submit" name="categ" value="<?php echo $rowCateg['categorie_blog']  ?>" style="background-color:transparent; "></input>

									</li>
								</form>
							</ul>
							<?php 
							}
							?>
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
	<!-- dark mode -->
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