<?php
include "constant.php";
session_start();

$formType = $_POST['form_type'];
var_dump($formType);
$errors = [];
if ($formType == 'personal') {
    $personalInfo = $_POST['personal'];

    if (!$personalInfo['given_name'] || !$personalInfo['family_name']
        || !$personalInfo['address_1'] || !$personalInfo['country']
        || !$personalInfo['suburb'] || !$personalInfo['email']) {
        $errors[] = ERROR_REQUIRED_MESSAGE;
    }

    if (strtolower($personalInfo['country']) == 'australia') {
        if (!$personalInfo['state'] || !$personalInfo['postcode']) {
            $errors[] = ERROR_REQUIRED_MESSAGE;
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: complete_booking.php');
        exit;
    } else {
        $_SESSION['personal'] = $personalInfo;
        header('Location: complete_booking_2.php');
    }

} elseif ($formType == 'payment') {
    $paymentDetail = $_POST['payment'];

    if (!$paymentDetail['credit_card_type'] || !$paymentDetail['credit_card_number']
        || !$paymentDetail['expired_month'] || !$paymentDetail['expired_year']) {
        $errors[] = ERROR_REQUIRED_MESSAGE;
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: complete_booking_2.php');
        exit;
    } else {
        $_SESSION['payment'] = $paymentDetail;
        header('Location: confirm_payment.php');
    }

} else {
    header('Location: index.php');
}