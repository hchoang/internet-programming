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
    $personalInfo = $_SESSION['personal'];
    ?>
    <legend>Personal Information</legend>
    <table class="table table-bordered">
        <?php
            foreach ($personalInfo as $key => $value) {
                echo "<tr><td>$key</td><td>$value</td></tr>";
            }
        ?>
    </table>
    <legend>Payment Details</legend>
    <form role="form" class="form-horizontal" method="post" action="form_checking.php">
        <input type="hidden" name="form_type" value="payment">
        <div class="form-group">
            <label class="control-label col-sm-2" for="credit_card_type">Credit Card Type:</label>
            <div class="col-sm-10">
                <select required="required" name="payment[card_type]" id="credit_card_type" class="form-control">
                    <option value="visa">VISA</option>
                    <option value="mastercard">Mastercard</option>
                    <option value="diners">Diners</option>
                    <option value="amex">Amex</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="credit_card_number">Credit Card Number:</label>
            <div class="col-sm-10">
                <input name="credit_card_number" required="required" type="text" class="form-control" id="credit_card_number" placeholder="Credit Card Number">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="expired_month">Expired Month: </label>
            <div class="col-sm-4">
                <select required="required" name="payment[expired_month]" id="expired_month" class="form-control">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        if ($i < 10)
                            echo "<option value='$i'>0$i</option>";
                        else
                            echo "<option value='$i'>$i</option>";

                    }
                    ?>
                </select>
            </div>
            <label class="control-label col-sm-2" for="expired_year">Expired Year: </label>
            <div class="col-sm-4">
                <select required="required" name="payment[expired_year]" id="expired_year" class="form-control">
                    <?php
                    for ($i = 2016; $i < 2030; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group"></div>
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
