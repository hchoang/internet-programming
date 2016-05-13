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
});