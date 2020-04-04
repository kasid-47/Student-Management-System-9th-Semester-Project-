<?php
ob_start();
session_start();
$acp = isset($_SESSION['acp']);
$tcp = isset($_SESSION['tcp']);
$scp = isset($_SESSION['scp']);
if (isset($_SESSION['scp']) || isset($_SESSION['tcp']) || isset($_SESSION['acp'])){
header("Location: /sdb/profile.php");
}
?>

<head>
<link rel="shortcut icon" href="BDFLAG.jpg">
 <title>Complete Student Management System-cse</title>
<!-- CSS/CSS for other design  */-->


 <link rel="stylesheet" href="http://localhost/sdb/assets/css/style..css" type="text/css"/> 
<script src="http://localhost/sdb/assets/jquery-2.1.1.min.js" type="text/javascript"></script>

<!-- new-- Bootstrap Core CSS -->
	
	
	<link rel="stylesheet" href="http://localhost/sdb/assets/css/bootstrap.css" rel="stylesheet">
	<!-- Template CSS -->
	
	
	<link rel="stylesheet" href="http://localhost/sdb/assets/css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="http://localhost/sdb/assets/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="http://localhost/sdb/assets/css/nexus.css" rel="stylesheet">
	<link rel="stylesheet" href="http://localhost/sdb/assets/css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="http://localhost/sdb/assets/css/custom.css" rel="stylesheet">
	

<!-- JS -->
<script type="text/javascript" src="http://localhost/sdb/assets/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://localhost/sdb/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://localhost/sdb/assets/js/scripts.js"></script>
<!-- Isotope - Portfolio Sorting -->
<script type="text/javascript" src="http://localhost/sdb/assets/js/jquery.isotope.js" type="text/javascript"></script>
<!-- Mobile Menu - Slicknav -->
<script type="text/javascript" src="http://localhost/sdb/assets/js/jquery.slicknav.js" type="text/javascript"></script>
<!-- Animate on Scroll-->
<script type="text/javascript" src="http://localhost/sdb/assets/js/jquery.visible.js" charset="utf-8"></script>
<!-- Slimbox2-->
<script type="text/javascript" src="http://localhost/sdb/assets/js/slimbox2.js" charset="utf-8"></script>
<!-- Modernizr -->
<script src="http://localhost/sdb/assets/js/modernizr.custom.js" type="text/javascript"></script>
<!-- End JS -->
 
</head>

<body>
	<div id="pre_header" class="visible-lg"></div>
	<div id="header" class="container">
		<div class="row">
			<!-- Logo -->
			<div class="logo">
				<a href="index.html" title="">
					<img src="http://localhost/sdb/assets/img/Varendra-University.png" alt="Logo" border="" width="180" height="100" hspace="" vspace="" />
				</a>
			</div>
			<!-- End Logo -->
			<!-- Top Menu -->
			<div class="col-md-12 margin-top-30">
				<div id="hornav" class="pull-right visible-lg">
					<ul class="nav navbar-nav">
						<li><a href="http://localhost/sdb/">Home</a></li>
						
				<li><a href="http://localhost/sdb/login.php">Login</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">About</a></li>
				
				</ul>
									
					</div>
				</div>
				<div class="clear"></div>
				<!-- End Top Menu -->
			</div>
		</div>
		<!-- === END HEADER === -->
		<!-- === BEGIN CONTENT === -->
		<div id="content" class="container">
			<div class="row margin-top-30">
				
			</div>
			<div class="row margin-top-10">
				<!-- Carousel Slideshow -->
				<div id="carousel-example" class="carousel slide" data-ride="carousel">
					<!-- Carousel Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example" data-slide-to="1"></li>
						<li data-target="#carousel-example" data-slide-to="2"></li>
						<li data-target="#carousel-example" data-slide-to="3"></li>
					</ol>
					<!-- End Carousel Indicators -->
					<!-- Carousel Images -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="http://localhost/sdb/assets/img/slideshow/slide4 - Copy.jpg">
						</div>
						<div class="item">
							<img src="http://localhost/sdb/assets/img/slideshow/slide2.jpg">
						</div>
						<div class="item">
							<img src="http://localhost/sdb/assets/img/slideshow/slide3.jpg">
						</div>
					</div>
					<!-- End Carousel Images -->
					<!-- Carousel Controls -->
					<a class="left carousel-control" href="#carousel-example" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
					<!-- End Carousel Controls -->
				</div>
				<!-- End Carousel Slideshow -->
			</div>
			<div class="row margin-vert-30">
				
				
			</div>
			<div class="row">
			
			</div>
			
		</div>
	</div>
		

			
<div id="base">
		<div class="container padding-vert-30">
			<div class="row">
				<!-- Thumbs Gallery -->
				<div class="col-md-3 margin-bottom-20">

					<div class="thumbs-gallery">
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image1.png">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image1.png" alt="image1.png">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image2.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image2.jpg" alt="image2.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image3.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image3.jpg" alt="image3.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image4.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image4.jpg" alt="image4.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image6.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image6.jpg" alt="image6.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image7.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image7.jpg" alt="image7.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image8.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image8.jpg" alt="image8.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image9.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image9.jpg" alt="image9.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image92.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image92.jpg" alt="image92.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image94.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image94.jpg" alt="image94.jpg">
						<i></i></a>
						
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image95.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image95.jpg" alt="image95.jpg">
						<i></i></a>
						
						<a class="thumbBox" rel="lightbox-thumbs" href="assets/img/thumbsgallery/image96.jpg">
							<img src="http://localhost/sdb/assets/img/thumbsgallery/thumbs/image96.jpg" alt="image96.jpg">
						<i></i></a>
						
						</div>			
						<div class="clearfix"></div>
					</div>
					<!-- End Thumbs Gallery -->
					<!-- Contact Details -->
					<div class="col-md-3 margin-bottom-20">
						<h3 class="margin-bottom-10">About University</h3>
					&lt;&lt; At a glance<br/>
&lt;&lt; History of VU<br/>
&lt;&lt; Mission & Vision<br/>
&lt;&lt; Award and Achievement<br/>
					</div>
					<!-- End Contact Details -->
					<!-- Sample Menu -->
					<div class="col-md-3 margin-bottom-20" >
						<h3 class="margin-bottom-10">About University</h3>
						</li>
							Varendra University Kazla, Motihar, Rajshahi<br/>
+880721-751274,+880721-751459<br/>
info@vu.edu.bd
						</ul>
						<div class="clearfix"></div>
						
					</div>
					<!-- End Sample Menu -->
					<!-- Disclaimer -->
					<div class="col-md-3 margin-bottom-20">
						<h3 class="margin-bottom-10">Admission</h3>
						&lt;&lt; Online Application<br/>
&lt;&lt; Application Form<br/>
&lt;&lt; Admission Test Result<br/>
&lt;&lt; Admission Query<br/>
						
						<div class="clearfix"></div>
					</div>
					<!-- End Disclaimer -->
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		