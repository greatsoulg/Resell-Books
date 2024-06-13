$(document).ready(function() {
    $('#paschk').hide();
    $('#cpwdchk').hide();

    var pass_err = true;
    var cpass_err = true;

    // Password validation
    $('#Password1').keyup(function() {
        pas_check();
    });

    function pas_check() {
        var pas_val = $('#Password1').val();
        if (pas_val.length == '') {
            $('#paschk').html("** YOU need to fill something");
            $('#paschk').show();
            $('#paschk').css("color", "red");
            pass_err = false;
        } else if (pas_val.length < 3 || pas_val.length > 10) {
            $('#paschk').show();
            $('#paschk').html("** Password must be between 3-10 characters");
            $('#paschk').css("color", "red");
            pass_err = false;
        } else {
            $('#paschk').hide();
            pass_err = true;
        }
    }

    // Confirm password validation
    $('#Password2').keyup(function() {
        cpass_check();
    });

    function cpass_check() {
        var cpas_val = $('#Password2').val();
        var pas_val = $('#Password1').val();
        if (cpas_val != pas_val) {
            $('#cpwdchk').html("** Passwords do not match");
            $('#cpwdchk').show();
            $('#cpwdchk').css("color", "red");
            cpass_err = false;
        } else {
            $('#cpwdchk').hide();
            cpass_err = true;
        }
    }

    // Form submission validation
    $('#submitbtn').click(function(event) {
        pass_err = true;
        cpass_err = true;

        pas_check();
        cpass_check();

        if (pass_err && cpass_err) {
            return true;
        } else {
            event.preventDefault();
            return false;
        }
    });
});
