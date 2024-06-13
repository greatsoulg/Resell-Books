$(document).ready(function() {
    $('#cont1chk').hide();
    $('#monychk').hide();

    var cont1_err = true;
    var money_err = true;

    // Request price validation
    $('#requestmoney').keyup(function() {
        money_check();
    });

    function money_check() {
        var mon_val = $('#requestmoney').val();
        if (isNaN(mon_val) || mon_val.length == '') {
            $('#monychk').html("** NOT a valid Amount");
            $('#monychk').show();
            $('#monychk').css("color", "red");
            money_err = false;
            return false;
        } else {
            $('#monychk').hide();
            money_err = true;
        }
    }

    // Contact number validation
    $('#requestcontact1').keyup(function() {
        cont1_check();
    });

    function cont1_check() {
        var c1_val = $('#requestcontact1').val();
        if (c1_val.length != 10 || isNaN(c1_val)) {
            $('#cont1chk').html("** NOT a valid contact number");
            $('#cont1chk').show();
            $('#cont1chk').css("color", "red");
            cont1_err = false;
            return false;
        } else {
            $('#cont1chk').hide();
            cont1_err = true;
        }
    }

    // Form submission validation
    $('#reqsubmit').click(function(event) {
        cont1_err = true;
        money_err = true;

        cont1_check();
        money_check();

        if (cont1_err && money_err) {
            return true;
        } else {
            event.preventDefault();
            return false;
        }
    });
});
