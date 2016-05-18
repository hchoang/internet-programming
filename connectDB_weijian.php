<?php
header('Content-type:application/json');

include "database_connector.php";

$action = $_POST ["action"];
if ($action == "getFrom") {
	$query_string = "select Distinct from_city  from flights ";
} else if ($action == "getTo") {
	$query_string = "select Distinct to_city  from flights ";
} else if ($action == "bothfrom") {
	if (isset ( $_POST ["city"] ) && ! empty ( $_POST ["city"] ))
		$query_string = "select Distinct to_city  from flights where from_city ='" . $_POST ["city"] . "'";
	else {
		$query_string = "select Distinct to_city  from flights ";
	}
}
$result = mysql_query ( $query_string ) or die ( "Error" );
$tempStr = array();
while ( $row = mysql_fetch_row ( $result ) ) {
	$tempStr[] = $row[0];
}

echo json_encode($tempStr);
header(' ', true, 200);
mysql_close ( $link );
?>
