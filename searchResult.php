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
	<script type="text/javascript">
function validate()
{
   var table = document.getElementsByName('flightChecked');
   var i;
   for(i=0; i<table.length; i++){
	   
		if (table[i].checked == true )
		{
			return true;
		}
   }
   
	 alert ( "Please choose a flight!" );
	 return false;
}

</script>
	<div class="container">

		 <?php
			include 'navi-bar.php';
			?>

		<form action="makeBooking.php" method="get"
			onSubmit="return validate();">		
<?php

$link = mysql_connect ( "localhost", "root", "noinhieula" );
if (! $link)
	die ( "Could not connect to Server" );
mysql_select_db ( "poti", $link );

if (isset ( $_SESSION ["citySelected"] ) && (isset ( $_POST ["searchTypeFrom"] ) or isset ( $_POST ["searchTypeTo"] ) or isset ( $_POST ["searchTypeBoth"] ))) {
	
	$selected_city = $_SESSION ['citySelected'];
	if (isset ( $_POST ["searchTypeFrom"] )) {
		$query_string = "select * from flights where (from_city like '$selected_city')";
	} else if (isset ( $_POST ["searchTypeTo"] ) && ($_POST ["searchTypeTo"])) {
		$query_string = "select * from flights where (to_city like '$selected_city')";
	} else if (isset ( $_POST ["searchTypeBoth"] ) && ($_POST ["searchTypeBoth"])) {
		$query_string = "select * from flights where (to_city like '$selected_city') or (from_city like '$selected_city') order by price";
	}
	
	$result = mysql_query ( $query_string );
	
	$num_rows = mysql_num_rows ( $result );
	
	if ($num_rows > 0) {
		echo "<br /><br /><br />";
		echo "<table class='table table-bordered' >";
		echo "<tr><th>From</th><th>To</th><th>Price</th><th>Select</th></tr>";
		while ( $a_row = mysql_fetch_assoc ( $result ) ) {
			echo "<tr>\n";
			echo "<td class='col-md-3'>" . $a_row ['from_city'] . "</td>";
			echo "<td class='col-md-3'>" . $a_row ['to_city'] . "</td>";
			echo "<td class='col-md-3'>" . $a_row ['price'] . "</td>";
			echo "<td class='col-md-3'><input type='radio' name='flightChecked' id ='flightChecked' value= '" . $a_row ['route_no'] . "'</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	echo "<br />";
	echo "<a class='btn btn-default btn-lg col-md-2 col-md-offset-2' href='search.php' role='button'>" . "New Search" . "</a>";
	
	echo "<input type='submit' value='Make Booking For Selected Flight' class='btn btn-default btn-lg col-md-4 col-md-offset-2'>";
} 

else {
	echo "<br /><br /><br /><h2>Please select city and search type!</h2><br/><br />";
	echo "<a class='btn btn-default btn-lg' href='search.php' role='button'>" . "New Search" . "</a>";
}

mysql_close ( $link );
?>

</form>

	</div>
	<!-- /container -->


	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
	class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
