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

	<?php
	include 'style.php';
	?>
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

include "database_connector.php";

if (isset ( $_POST ["fromSelect"] ) || (isset ( $_POST ["toSelect"] ))) {
	
	if (isset ( $_POST ["fromSelect"] ) && (! isset ( $_POST ["toSelect"] ))) {
		
		$from_city = $_POST ["fromSelect"];
		$query_string = "select * from flights where (from_city like '$from_city')";
	} 

	else if (isset ( $_POST ["toSelect"] ) && (! isset ( $_POST ["fromSelect"] ))) {
		
		$to_city = $_POST ["toSelect"];
		$query_string = "select * from flights where (to_city like '$to_city')";
	} 

	else if (isset ( $_POST ["fromSelect"] ) && (isset ( $_POST ["toSelect"] ))) {
		
		$from_city = $_POST ["fromSelect"];
		$to_city = $_POST ["toSelect"];
		$query_string = "select * from flights where (from_city like '$from_city') and (to_city like '$to_city')";
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


	<?php
	include 'script.php';
	?>

</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
	class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
