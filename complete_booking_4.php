<?php
session_start();
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
    <![endif]-->
</head>

<body>

<div class="container">
    <?php
    include 'navi-bar.php';
    include "common.php";
    $personalInfo = getPersonalInfoFromSession();
    sendEmail($personalInfo);
    
    session_destroy();
    ?>

    <br>
    <br>
    <legend>Complete Booking - Stage 4 of 4 - Confirm Payment</legend>
    <div class="jumbotron">
        <span style="font-weight: bolder; font-size: large">Thank You - Your Booking has been completed and an email has been sent to your email address</span>
    </div>



</div>

<?php
include 'script.php';
?>


</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
        class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>

