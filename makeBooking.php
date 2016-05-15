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

<body onload="showNum()">

	<script type="text/javascript">

	var my_number = 0;
	
function showNum(){
	var table = document.getElementsByName('seatCheck');
	   var i;
	   for(i=0; i<table.length; i++){
		   
			if (table[i].checked == true )
			{
				my_number ++;
			}
	   }
  	document.getElementById("demo").innerHTML = my_number;
}

function myFunction(n) {
	if(document.getElementById("seat"+n).checked == true){
  	document.getElementById("child"+n).disabled = false;
  	document.getElementById("wheel"+n).disabled = false;
  	document.getElementById("diet"+n).disabled = false;
  	
  	my_number ++;
  	document.getElementById("demo").innerHTML = my_number;
  	
	}
	else{
	  	document.getElementById("child"+n).disabled = true;
	  	document.getElementById("child"+n).checked = false;
	  	document.getElementById("wheel"+n).disabled = true;
	  	document.getElementById("wheel"+n).checked = false;
	  	document.getElementById("diet"+n).disabled = true;
	  	document.getElementById("diet"+n).checked = false;	 

	  	my_number --;
	  	document.getElementById("demo").innerHTML = my_number;
	}
	
}

function validate()
{
   var table = document.getElementsByName('seatCheck');
   var i;
   var string="<?php echo $_SESSION ['bookingData']; ?>";
   var flightNo = "<?php echo $_GET ['flightChecked']; ?>" ;

   
   for(i=0; i<table.length; i++){

	   if (table[i].checked == true )
	   {
		   var n = i+1;
		   string = string.concat(" ", flightNo);

		   if(document.getElementById("child"+n).checked  == true){
			   
			   if(document.getElementById("wheel"+n).checked == true){
				   
				   if(document.getElementById("diet"+n).checked == true){
					   string = string.concat(" ", "0");
				   }
				   else{
					   string = string.concat(" ", "1");
				   }
			   }
				   
			   else{
				   if(document.getElementById("diet"+n).checked == true){
						   string = string.concat(" ", "2");
					   }
				   else{
						   string = string.concat(" ", "3");
					   }
				   }   
		   }
		   else{
 				if(document.getElementById("wheel"+n).checked == true){
				   
				   if(document.getElementById("diet"+n).checked == true){
					   string = string.concat(" ", "4");
				   }
				   else{
					   string = string.concat(" ", "5");
				   }
			   }
				   
			   else{
				   if(document.getElementById("diet"+n).checked == true){
						   string = string.concat(" ", "6");
					   }
				   else{
						   string = string.concat(" ", "7");
					   }
				   }   
		   }
		}
	}
	   
  
 	document.getElementById("hiddenInput").value = string;
 	  
   for(i=0; i<table.length; i++){
	   
		if (table[i].checked == true )
		{
			
			return true;
		}
   }
   
	 alert ( "Please choose a seat!" );
	 return false;
}
</script>

	<div class="container">

		 <?php
			include 'navi-bar.php';
			?>
		
<?php
$_SESSION ['flightSelected'] = $_GET ['flightChecked'];
$link = mysql_connect ( "rerun", "potiro", "pcXZb(kL" );
if (! $link)
	die ( "Could not connect to Server" );
mysql_select_db ( "poti", $link );
$flightNo = $_SESSION ['flightSelected'];
$query_string = "select * from flights where (route_no = '$flightNo')";
$result = mysql_query ( $query_string );
while ( $a_row = mysql_fetch_assoc ( $result ) ) {
	echo '<br /><h2>You selected flight: ' . $a_row ['from_city'] . ' to ' . $a_row ['to_city'] . '<br />Price: $' . $a_row ['price'] . 'ea</h2><br />';
}
?>


		<div class='container col-md-9'>
			<form action="allBookedFlight.php" method="post"
				onSubmit="return validate();">
				<table class='table table-bordered' id='flightTable'>
					<tr>
						<td class='col-md-1'>1</td>
						<td class='col-md-2'><input type="checkbox" id="seat1"
							name="seatCheck" onChange="myFunction(1)">Seat</td>
						<td class='col-md-2'><input type="checkbox" id="child1"
							disabled="true">Child</td>
						<td class='col-md-2'><input type="checkbox" id="wheel1"
							disabled="true">Wheelchair</td>
						<td class='col-md-2'><input type="checkbox" id="diet1"
							disabled="true">Special Diet</td>
					</tr>
					<tr>
						<td>2</td>
						<td><input type="checkbox" id="seat2" name="seatCheck"
							onChange="myFunction(2)">Seat</td>
						<td><input type="checkbox" id="child2" disabled="true">Child</td>
						<td><input type="checkbox" id="wheel2" disabled="true">Wheelchair</td>
						<td><input type="checkbox" id="diet2" disabled="true">Special Diet</td>
					</tr>
					<tr>
						<td>3</td>
						<td><input type="checkbox" id="seat3" name="seatCheck"
							onChange="myFunction(3)">Seat</td>
						<td><input type="checkbox" id="child3" disabled="true">Child</td>
						<td><input type="checkbox" id="wheel3" disabled="true">Wheelchair</td>
						<td><input type="checkbox" id="diet3" disabled="true">Special Diet</td>
					</tr>
					<tr>
						<td>4</td>
						<td><input type="checkbox" id="seat4" name="seatCheck"
							onChange="myFunction(4)">Seat</td>
						<td><input type="checkbox" id="child4" disabled="true">Child</td>
						<td><input type="checkbox" id="wheel4" disabled="true">Wheelchair</td>
						<td><input type="checkbox" id="diet4" disabled="true">Special Diet</td>
					</tr>
					<tr>
						<td>5</td>
						<td><input type="checkbox" id="seat5" name="seatCheck"
							onChange="myFunction(5)">Seat</td>
						<td><input type="checkbox" id="child5" disabled="true">Child</td>
						<td><input type="checkbox" id="wheel5" disabled="true">Wheelchair</td>
						<td><input type="checkbox" id="diet5" disabled="true">Special Diet</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<h3>Number of seat(s) selected: &nbsp;</h3>
						</td>
						<td>
							<h3 id="demo"></h3>
						</td>
					</tr>
				</table>
				<input type="submit" value="Add to Bookings"
					class="btn btn-default btn-lg"> <input type="hidden"
					name="bookingData" id="hiddenInput"
					value="<?php $yes= "<p id='hiddenInput'> </p>"; echo $yes;?>">
			</form>
		</div>



		<!-- Site footer -->

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
