<?php
include "constant.php";
session_start();
unset($_SESSION['errors']);
$formType = $_POST['form_type'];
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
    if (!$paymentDetail['card_type']
        || !$paymentDetail['credit_card_number']
        || !$paymentDetail['expired_month']
        || !$paymentDetail['expired_year']) {
        $errors[] = ERROR_REQUIRED_MESSAGE;
    }

    if ($paymentDetail['expired_year'] < 2016 || ($paymentDetail['expired_year'] == 2016 && $paymentDetail['expired_month'] < 5)) {
        $errors[] = ERROR_INVALID_EXPIRED_CARD;
    }

    if (!preg_match('/^[0-9]{12}$/', $paymentDetail['credit_card_number'])) {
        $errors[] = ERROR_INVALID_CARD_NUMBER;
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