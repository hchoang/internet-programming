<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com">
<head>
<meta charset="utf-8">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width, initial-scale=1" name="viewport">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta content="" name="description">
<meta content="" name="author">

<title>Internet Programming - Assingment 1</title>

	<?php
		include "style.php";
	?>
</head>

<body>

	<div class="container">
 <?php
	include 'navi-bar.php';
	?>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="img/img1.jpg" alt="..." class="carousel-image">
					<div class="carousel-caption">
						...
					</div>
				</div>
				<div class="item">
					<img src="img/img2.jpg" alt="..." class="carousel-image">
					<div class="carousel-caption">
						...
					</div>
				</div>
				<div class="item">
					<img src="img/img3.jpg" alt="..." class="carousel-image">
					<div class="carousel-caption">
						...
					</div>
				</div>

			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- Jumbotron -->
		<div class="jumbotron">
			<h2>Welcome to UTS Travel Agency</h2>
            <button class="btn btn-default"><a class="unstyled-a" href="search.php">Search Flight</a></button>
            <button class="btn btn-default"><a class="unstyled-a" href="booking.php">Your Bookings</a></button>
		</div>



	</div>
	<!-- /container -->

    <?php
        include 'script.php';
    ?>


</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
	class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
