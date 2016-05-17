<?php
session_start();
include "common.php";
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

    <title>Complete Booking - Stage 3 of 4 - Review Bookings and Details</title>

    <?php
        include 'style.php';
    ?>
</head>

<body>

<div class="container">
    <?php
    include 'navi-bar.php';
    ?>
    <br>
    <br>
    <legend class="">Complete Booking - Stage 3 of 4 - Review Bookings and Details</legend>
    <span style="font-weight: bold; font-size: large; text-align: center">Personal Information</span><br/><br/>
    <table class="table table-bordered  table-striped">
        <?php
        $personalInfo = getPersonalInfoFromSession();
        $countries = countryList();
        foreach ($personalInfo as $key => $value) {
            if (strcmp($key, 'country') == 0) {
                $value = $countries[$value];
            }
            $value = ($value) ? $value : "N/A";
            echo "<tr><td><span style='font-weight: bold;'>". personalInfoTransform($key). "</span></td><td>$value</td></tr>";
        }
        include "database_connector.php";
        ?>

    </table>
    <?php
        $string = $_SESSION['bookingData'];
        $array = explode ( ' ', $string );
        $price = 0;
        $bookings = array();
        echo "<br /><br /><span style='font-weight: bold; font-size: large; text-align: center'>Tickets Details</span><br /> <br/>";

        echo "<table class='table table-bordered table-striped'>";
        echo "<tr><th>From</th><th>To</th><th>Price</th><th>Seat Detail</th></tr>";

        for($i = 1; $i < count ( $array ); $i = $i + 2) {
            $booking = array();
            $flight = $array [$i];
            $booking['route_no'] = $flight;
            $condition = $array [$i + 1];
            $query_string = "select * from flights where (route_no = '$flight')";
            $result = mysql_query($query_string);
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
                $price += $a_row['price'];
                $booking['from_city'] = $a_row ['from_city'];
                $booking['to_city'] = $a_row['from_city'];
                $booking['price'] = $a_row['price'];
                $booking['condition'] = $detail;
                echo "<tr>\n";
                echo "<td class='col-md-3'>" . $a_row ['from_city'] . "</td>";
                echo "<td class='col-md-3'>" . $a_row ['to_city'] . "</td>";
                echo "<td class='col-md-3'>" . $a_row ['price'] . "</td>";
                echo "<td class='col-md-3'>" . $detail . "</td>";
                echo "</tr>";
            }
            $bookings[] = $booking;
        }
        echo "<tr><td colspan='3'><span class='pull-right' style='font-weight: bold'>Total:</span></td><td>$$price</td></tr>";
        echo "</table>";
        echo "<br /><br />";
        $_SESSION['booking_detail'] = $bookings;
    ?>
    <span style="font-weight: bold; font-size: large; text-align: center">Payment Information</span><br/><br/>
    <table class="table table-bordered">
        <tr><td style="text-align: center; font-style: italic; font-weight: bold">Credit Card Details Supplied</td></tr>
    </table>
    <div class="btn btn-default btn-lg col-sm-3 pull-right"><a class="unstyled-a" href="complete_booking_4.php">Stage 4 - Confirm Payment</a></div>
</div>
<!-- /container -->
<?php
mysql_close($link);
include 'script.php';
?>


</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
        class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
