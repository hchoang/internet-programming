<?php
function personalInfoTransform($columnName) {
    if (strcmp($columnName, 'family_name') == 0) {
        return 'Family Name';
    } elseif (strcmp($columnName, 'given_name') == 0) {
       return 'Given Name';
    } elseif (strcmp($columnName, 'address_1') == 0) {
       return 'Address 1';
    } elseif (strcmp($columnName, 'address_2') == 0) {
       return 'Address 2';
    } elseif (strcmp($columnName, 'country') == 0) {
       return 'Country';
    } elseif (strcmp($columnName, 'state') == 0) {
       return 'State';
    } elseif (strcmp($columnName, 'suburb') == 0) {
       return 'Suburb';
    } elseif (strcmp($columnName, 'postcode') == 0) {
       return 'Postcode';
    } elseif (strcmp($columnName, 'email') == 0) {
       return 'Email';
    } elseif (strcmp($columnName, 'mobile_number') == 0) {
       return 'Mobile Number';
    } elseif (strcmp($columnName, 'business_number') == 0) {
       return 'Business Number';
    } elseif (strcmp($columnName, 'work_number') == 0) {
       return 'Work Number';
    }
}

function sendEmail() {
    mail('huycat12@gmail.com', 'test', 'test');
}