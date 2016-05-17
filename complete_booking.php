<?php
session_start ();
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

<title>Complete Booking - stage 1 of 4 - Personal Details</title>

    <?php
        include "style.php";
    ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
</head>

<body>

    <div class="container">
    <?php
        include 'navi-bar.php';
        $errors = $_SESSION['errors'];
        $errorInput = $_SESSION['personal_error'];
    ?>
        <br><br>
        <div class="col-sm-12">
            <legend class="col-sm-9 col-sm-offset-1">Complete Booking - Stage 1 of 4 - Personal Details</legend>
        </div>

        <span class="col-sm-12 col-sm-offset-1" style="color: red;font-style: italic">-- * Indicated required field --</span>
        <span class="col-sm-12 col-sm-offset-1" style="color: red; font-style: italic">-- State and Postcode field is optional when booking is made from outside Australia</span>

        <div class="col-sm-9 col-sm-offset-1 alert alert-warning <?php if (empty($errors)) echo 'hidden' ?>" id="errors">
            <strong>Error!</strong>
            <ul class="error-list">
                <?php
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                ?>
            </ul>
        </div>
        <form id="personal_form" role="form" class="form-horizontal col-sm-9 col-sm-offset-1" method="post" action="form_checking.php" >
            <input type="hidden" name="form_type" value="personal">
            <div class="form-group">
                <label class="control-label col-sm-2" for="famiy_name">Family Name<span class="required">*</span>:</label>
                <div class="col-sm-10">
                    <input required="required" name="personal[family_name]" type="text" class="form-control" id="family_name" placeholder="Family Name"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[family_name]'"; ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="given_name">Given Name<span class="required">*</span>:</label>
                <div class="col-sm-10">
                    <input required="required" name="personal[given_name]" type="text" class="form-control" id="given_name" placeholder="Given Name"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[given_name]'"; ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="address_1">Address Line 1<span class="required">*</span>: </label>
                <div class="col-sm-10">
                    <input required="required" name="personal[address_1]" type="text" class="form-control" id="address_1" placeholder="Address Line 1"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[address_1]'"; ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="address_2">Address Line 2: </label>
                <div class="col-sm-10">
                    <input name="personal[address_2]" type="text" class="form-control" id="address_2" placeholder="Address Line 2"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[address_2]'"; ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="country">Country<span class="required">*</span>: </label>
                <div class="col-sm-10">
                    <select required="required" name="personal[country]" class="form-control" id="country">
                        <option disabled selected value> -- select an option -- </option>
                        <?php
                            $countries = countryList();
                            foreach ($countries as $key => $val) {
                                if ($errorInput) {
                                    if (strcmp($errorInput['country'], $key) == 0) {
                                        echo "<option selected = 'selected' value='$key'>$val</option>";
                                    } else {
                                        echo "<option value='$key'>$val</option>";
                                    }
                                } else {
                                    echo "<option value='$key'>$val</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="state">State<span class="required optional">*</span>: </label>
                <div class="col-sm-10">
                    <input name="personal[state]" type="text" class="form-control" id="state" placeholder="State"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[state]'"; ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="suburb">Suburb<span class="required">*</span>: </label>
                <div class="col-sm-4">
                    <input required="required" name="personal[suburb]" type="text" class="form-control" id="suburb" placeholder="Suburb"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[suburb]'"; ?>>
                </div>
                <label class="control-label col-sm-2" for="postcode">Postcode<span class="required optional">*</span>: </label>
                <div class="col-sm-4">
                    <input name="personal[postcode]" type="text" class="form-control" id="postcode" placeholder="Postcode"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[postcode]'"; ?>>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email<span class="required">*</span>:</label>
                <div class="col-sm-10">
                    <input required="required" name="personal[email]"  class="form-control" id="email" placeholder="Email"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[email]'"; ?>>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="mobile_number">Mobile Number: </label>
                <div class="col-sm-10">
                    <input name="personal[mobile_number]" type="text" class="form-control" id="mobile_number" placeholder="Mobile Phone Number (Number Only)"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[mobile_number]'"; ?>>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="business_number_number">Business No:</label>
                <div class="col-sm-10">
                    <input name="personal[business_number]" type="text" class="form-control" id="business_number" placeholder="Business Phone Number (Number Only)"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[business_number]'"; ?>>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="work_number">Work Number:</label>
                <div class="col-sm-10">
                    <input name="personal[work_number]" type="text" class="form-control" id="work_number" placeholder="Work Phone Number (Number Only)"
                        <?php echo (!$errorInput) ?  null :  "value='$errorInput[work_number]'"; ?>>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-10"></div>
                <input id="personal_submit" class="btn btn-default btn-lg pull-right" type="submit" value="Stage 2 - Payment Details">
            </div>
        </form>
    </div>
    <!-- /container -->
    <?php
        include 'script.php';
        unset($_SESSION['errors']);
        unset($_SESSION['personal_error']);
    ?>


</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
    class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
