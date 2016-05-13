<?php
session_start ();
?>
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

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link rel="stylesheet" href="css/ie10-viewport-bug-workaround.css">

<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/justified-nav.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<div class="container">

		 <?php
			include 'navi-bar.php';
			?>
		
<?php
$_SESSION ['flightSelected'] = $_GET ['flightChecked'];
echo '<br /><h2>You selected ' . $_SESSION ['flightSelected'] . '</h2><br />';
?>


	</div>
	<!-- /container -->


	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
	class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
