$(document).ready(function () {

    $('#country').change(function () {
        if ($(this).val() == 'Australia') {
            $('#state').prop('required', true);
            $('#postcode').prop('required', true);
        } else {
            $('#state').removeProp('required');
            $('#postcode').removeProp('required');
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

    var creditCardNumber = RegExp('^[0-9]{12}$');
    if (!creditCardNumber.test($('#credit_card_number').val())) {
        errors.push('There is problem with credit card number');
    }
    return errors;
}