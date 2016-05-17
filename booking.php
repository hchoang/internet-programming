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
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<title>Internet Programming - Assingment 1</title>

	<?php
		include 'style.php';
	?>
</head>

<body>
	<script type="text/javascript">
function validate()
{
	 var table = document.getElementsByName('deleteFlight[]');
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

		<!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
		 <?php
			include 'navi-bar.php';
			?>

		<form action="booking.php" method="post" onSubmit="return validate();">
<?php

include 'database_connector.php';

if (isset ( $_POST ['deleteFlight'] )) {
	$string = $_SESSION ['bookingData'];
	$array = explode ( ' ', $string );
	$num = count ( $_POST ['deleteFlight'] );
	foreach ( $_POST ['deleteFlight'] as $check ) {
		
		unset ( $array [$check] );
		unset ( $array [$check + 1] );
	}
	
	$string = implode ( ' ', $array );
	$_SESSION ['bookingData'] = $string;
	
	if (count ( $array ) < ($num + 1)) {
		unset ( $_SESSION ['bookingData'] );
	}
}

if (isset ( $_SESSION ["bookingData"] )) {
	$string = $_SESSION ['bookingData'];
	$array = explode ( ' ', $string );
	
	echo "<br /><br /><br />";
	echo "<table class='table table-bordered' >";
	echo "<tr><th>From</th><th>To</th><th>Price</th><th>Seat Detail</th><th>Select</th></tr>";
	
	for($i = 1; $i < count ( $array ); $i = $i + 2) {
		$flight = $array [$i];
		$condition = $array [$i + 1];
		$query_string = "select * from flights where (route_no = '$flight')";
		$result = mysql_query ( $query_string );
		$detail = "None";
		if ($condition == "0") {
			$detail = "Child, Wheelchair, Special Diet";
		} else if ($condition == "1") {
			$detail = "Child, Wheelchair";
		} else if ($condition == "2") {
			$detail = "Child, SpecialDiet";
		} else if ($condition == "3") {
			$detail = "Child";
		} else if ($condition == "4") {
			$detail = "Wheelchair, Special Diet";
		} else if ($condition == "5") {
			$detail = "Wheelchair";
		} else if ($condition == "6") {
			$detail = "Special Diet";
		} else if ($condition == "7") {
			$detail = "None";
		}
		
		while ( $a_row = mysql_fetch_assoc ( $result ) ) {
			echo "<tr>\n";
			echo "<td class='col-md-2'>" . $a_row ['from_city'] . "</td>";
			echo "<td class='col-md-2'>" . $a_row ['to_city'] . "</td>";
			echo "<td class='col-md-2'>" . $a_row ['price'] . "</td>";
			echo "<td class='col-md-3'>" . $detail . "</td>";
			echo "<td class='col-md-1'><input type='checkbox' name='deleteFlight[]' id ='deleteFlight' value= '" . $i . "'</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "<input type='submit' value='Delete Selected Flights' class='btn btn-default btn-lg col-md-3 col-md-offset-2'>";
	echo "<a class='btn btn-default btn-lg col-md-3 col-md-offset-2' href='complete_booking.php' role='button'>" . "Proceed to Checkout" . "</a>";
} 

else {
	echo "<br /><br /><br /><h2>You have no bookings!</h2><br/><br />";
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
