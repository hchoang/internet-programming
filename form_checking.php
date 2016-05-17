<?php
session_start();
include "constant.php";
unset($_SESSION['errors']);
$formType = $_POST['form_type'];
$errors = array();
if ($formType == 'personal') {

    $personalInfo = $_POST['personal'];

    if (!$personalInfo['given_name'] || !$personalInfo['family_name']
        || !$personalInfo['address_1'] || !$personalInfo['country']
        || !$personalInfo['suburb'] || !$personalInfo['email']) {
        $errors[] = ERROR_REQUIRED_MESSAGE;
    } elseif (strcmp($personalInfo['country'], 'aus') == 0) {
        if (!$personalInfo['state'] || !$personalInfo['postcode']) {
            $errors[] = ERROR_REQUIRED_MESSAGE;
        }
    }

    if ($personalInfo['mobile_number']) {
        if (!preg_match('/^[0-9]+$/', $personalInfo['mobile_number'])) {
            $errors[] = ERROR_INVALID_PHONE_NUMBER;
        }
    } elseif ($personalInfo['business_number']) {
        if (!preg_match('/^[0-9]+$/', $personalInfo['business_number'])) {
            $errors[] = ERROR_INVALID_PHONE_NUMBER;
        }
    } elseif ($personalInfo['work_number']) {
        if (!preg_match('/^[0-9]+$/', $personalInfo['work_number'])) {
            $errors[] = ERROR_INVALID_PHONE_NUMBER;
        }
    }

    if ($personalInfo['email']) {
        if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $personalInfo['email'])) {
            $errors[] = ERROR_INVALID_EMAIL;
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['personal_error'] = $personalInfo;
        header('Location: complete_booking.php');
        exit;
    } else {
        $_SESSION['personal'] = $personalInfo;
        header('Location: complete_booking_2.php');
        exit;
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
        exit;
    }

} else {
    header('Location: index.php');
}