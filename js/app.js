$(document).ready(function () {

    $('#country').change(function () {
        if ($(this).val() == 'AUS') {
            $('#state').prop('required', true);
            $('#postcode').prop('required', true);
            $('.optional').removeClass('hidden')
        } else {
            $('#state').removeProp('required');
            $('#postcode').removeProp('required');
            $('.optional').addClass('hidden');
        }
    });

    $('#personal_submit').on('click', function (e) {
        e.preventDefault();
        var errors = validatePersonalDetail();
        if (errors.length > 0) {
            $('#errors').removeClass('hidden');
            $('#errors ul').empty();
            errors.forEach(function (error) {
                $('#errors ul').append(
                    $('<li>').append(error)
                );
            });
        } else {
            $('#personal_form').submit();
        }
    });
    
    $('#payment_submit').on('click', function (e) {
        e.preventDefault();
        var errors = validatePayment();
        if (errors.length > 0) {
            $('#errors').removeClass('hidden');
            $('#errors ul').empty();
            errors.forEach(function (error) {
                $('#errors ul').append(
                    $('<li>').append(error)
                );
            });
        } else {
            $('#payment_form').submit();
        }
    })
});

function validatePayment () {
    var errors = [];
    if (!$('#credit_card_type').val() || !$('#credit_card_number').val() || !$('#expired_month').val()
        || !$('#expired_year').val()) {
        errors.push('One or more compulsory field is blank');
    }

    if ($('#expired_year').val() == 2016 && $('#expired_month').val() < 5) {
        errors.push('Invalid card expired input');
    }

    var creditCardNumber = new RegExp('^[0-9]{12}$');
    if (!creditCardNumber.test($('#credit_card_number').val())) {
        errors.push('There is problem with credit card number');
    }
    return errors;
}

function validatePersonalDetail() {
    var errors = [];
    if (!$('#given_name').val() || !$('#family_name').val() || !$('#address_1').val()
        || !$('#suburb').val() || !$('#country').val() || !$('#email').val()) {
        errors.push('One or more compulsory field is blank');
    } else if ($('#country').val() == 'AUS') {
        if (!$('#state').val() || !$('#postcode').val()) {
            if (!$.inArray('One or more compulsory field is blank', errors)) {
                errors.push('One or more compulsory field is blank');
            }
        }
    }

    var phoneNumber = new RegExp('^[0-9]+$');
    if ($('#mobile_number').val() && !phoneNumber.test($('#mobile_number').val())) {
        errors.push('Phone number inputs is number only');
    } else if ($('#business_number').val() && !phoneNumber.test($('#business_number').val())) {
        errors.push('Phone number inputs is number only');
    } else if ($('#work_number').val() && !phoneNumber.test($('#work_number').val())) {
        errors.push('Phone number inputs is number only');
    }

    var email = new RegExp('^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$');
    if ($('#email').val() && !email.test($('#email').val())) {
        errors.push('Invalid email input');

    }

    return errors;
}