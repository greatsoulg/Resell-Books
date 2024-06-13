$(document).ready(function() {
    $('#usrchk').hide();
    $('#bonamchk').hide();
    $('#paschk').hide();
    $('#cpwdchk').hide();
    $('#emchk').hide();
    $('#phchk').hide();
    $('#deschk').hide();
    $('#selchk').hide();

    // Error flags
    var bonm_err = true;
    var desc_err = true;
    var em_err = true;
    var pass_err = true;
    var cpass_err = true;
    var emchk_err = true;
    var ph_err = true;
    var sel_err = true;

    // Book name validation
    $('#bookname').keyup(function() {
        bonm_check();
    });

    function bonm_check() {
        var bonm_val = $('#bookname').val();
        if (bonm_val.length == '') {
            $('#bonamchk').show();
            $('#bonamchk').html("** YOU need to fill Bookname");
            $('#bonamchk').css("color", "red");
            bonm_err = false;
            return false;
        } else if (bonm_val.length < 3 || bonm_val.length > 10) {
            $('#bonamchk').show();
            $('#bonamchk').html("** Book name must be between 3-10 characters");
            $('#bonamchk').css("color", "red");
            bonm_err = false;
            return false;
        } else {
            $('#bonamchk').hide();
            bonm_err = true;
        }
    }

    // Description validation
    $('#tarea1').keyup(function() {
        desc_check();
    });

    function desc_check() {
        var desc_val = $('#tarea1').val();
        if (desc_val.length == '') {
            $('#deschk').show();
            $('#deschk').html("** YOU need to fill Description about book");
            $('#deschk').css("color", "red");
            desc_err = false;
            return false;
        } else if (desc_val.length < 3 || desc_val.length > 10) {
            $('#deschk').show();
            $('#deschk').html("** Book description must be between 3-10 characters");
            $('#deschk').css("color", "red");
            desc_err = false;
            return false;
        } else {
            $('#deschk').hide();
            desc_err = true;
        }
    }

    // Username validation
    $('#uname').keyup(function() {
        email_check();
    });

    function email_check() {
        var user_val = $('#uname').val();
        if (user_val.length == '') {
            $('#usrchk').show();
            $('#usrchk').html("** YOU need to fill something");
            $('#usrchk').css("color", "red");
            em_err = false;
            return false;
        } else if (user_val.length < 3 || user_val.length > 10) {
            $('#usrchk').show();
            $('#usrchk').html("** Username must be between 3-10 characters");
            $('#usrchk').css("color", "red");
            em_err = false;
            return false;
        } else {
            $('#usrchk').hide();
            em_err = true;
        }
    }

    // Password validation
    $('#paswd').keyup(function() {
        pass_check();
    });

    function pass_check() {
        var pas_val = $('#paswd').val();
        if (pas_val.length == '') {
            $('#paschk').html("** YOU need to fill something");
            $('#paschk').show();
            $('#paschk').css("color", "red");
            pass_err = false;
            return false;
        } else if (pas_val.length < 3 || pas_val.length > 10) {
            $('#paschk').show();
            $('#paschk').html("** Password must be between 3-10 characters");
            $('#paschk').css("color", "red");
            pass_err = false;
            return false;
        } else {
            $('#paschk').hide();
            pass_err = true;
        }
    }

    // Confirm password validation
    $('#cpwd').keyup(function() {
        cpass_check();
    });

    function cpass_check() {
        var cpas_val = $('#cpwd').val();
        var pas_val = $('#paswd').val();
        if (cpas_val != pas_val) {
            $('#cpwdchk').html("** Passwords do not match");
            $('#cpwdchk').show();
            $('#cpwdchk').css("color", "red");
            cpass_err = false;
            return false;
        } else {
            $('#cpwdchk').hide();
            cpass_err = true;
        }
    }

    // Email validation
    $('#emal').keyup(function() {
        emal_chek();
    });

    function emal_chek() {
        var emal_val = $('#emal').val();
        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if (!reg.test(emal_val)) {
            $('#emchk').html("** Not a valid email");
            $('#emchk').show();
            $('#emchk').css("color", "red");
            emchk_err = false;
            return false;
        } else {
            $('#emchk').hide();
            emchk_err = true;
        }
    }

    // Phone number validation
    $('#phno').keyup(function() {
        ph_chek();
    });

    function ph_chek() {
        var ph_val = $('#phno').val();
        if (ph_val.length != 10 || isNaN(ph_val)) {
            $('#phchk').html("** Not a valid Phone number");
            $('#phchk').show();
            $('#phchk').css("color", "red");
            ph_err = false;
            return false;
        } else {
            $('#phchk').hide();
            ph_err = true;
        }
    }

    // Select validation
    function sel_chek() {
        var sel = $("select[name='genre1']");
        if (sel.val() == "") {
            $('#selchk').show();
            $('#selchk').html("** YOU need to select something");
            $('#selchk').css("color", "red");
            sel_err = false;
            return false;
        } else {
            $('#selchk').hide();
            sel_err = true;
        }
    }

    // Form submission validation
    $('#subtn').click(function(event) {
        bonm_check();
        desc_check();
        email_check();
        pass_check();
        cpass_check();
        emal_chek();
        ph_chek();
        sel_chek();

        if (bonm_err && desc_err && em_err && pass_err && cpass_err && emchk_err && ph_err && sel_err) {
            return true;
        } else {
            event.preventDefault();
            return false;
        }
    });
});
