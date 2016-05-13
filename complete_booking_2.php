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
    <form role="form" class="form-horizontal" method="post" action="complete_booking.php" onsubmit="validate();">
        <legend>Personal Information</legend>
        <div class="form-group">
            <label class="control-label col-sm-2" for="famiy_name">Family Name:</label>
            <div class="col-sm-10">
                <input required="required" type="text" class="form-control" id="family_name" placeholder="Family Name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="given_name">Given Name:</label>
            <div class="col-sm-10">
                <input required="required" type="text" class="form-control" id="given_name" placeholder="Given Name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address_1">Address Line 1: </label>
            <div class="col-sm-10">
                <input required="required" type="text" class="form-control" id="address_1" placeholder="Address">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address_2">Address Line 2: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address_2" placeholder="Address">
            </div>
        </div>
        <div class="form-group">

        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="country">Country: </label>
            <div class="col-sm-10">
                <select required="required" class="form-control" id="country">
                    <option disabled selected value> -- select an option -- </option>
                    <option value="Australia">Australia</option>
                    <option value="U.S">U.S</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="state">State: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="state" placeholder="State">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="suburb">Suburb: </label>
            <div class="col-sm-4">
                <input required="required" type="text" class="form-control" id="suburb" placeholder="Suburb">
            </div>
            <label class="control-label col-sm-2" for="postcode">Postcode </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="postcode" placeholder="Postcode">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input required="required" type="email" class="form-control" id="email" placeholder="Email">
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="mobile_number">Contact Number: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mobile_number" placeholder="Mobile Phone Number">
                    </div>
                    <div class="col-sm-10 col-sm-offset-2 hidden">
                        <input type="text" class="form-control" id="business_number" placeholder="Business Phone Number">
                    </div>
                    <div class="col-sm-10 col-sm-offset-2 hidden">
                        <input type="text" class="form-control" id="work_number" placeholder="Work Phone Number">
                    </div>
                    <div class="col-sm-2 col-sm-offset-10 btn btn-default">
                        Add More Number
                    </div>
                </div>
            </div>
        </div>

    </form>


    <!-- Site footer -->
    <footer class="footer"> </footer>

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
