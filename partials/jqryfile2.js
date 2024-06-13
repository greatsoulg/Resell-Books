$(document).ready(function() {
    $('#selchk').hide();
    $('#bonamchk').hide();
    $('#deschk').hide();
    $('#isbnchk').hide();
    $('#authchk').hide();
    $('#ogpchk').hide();

    var sel_err = true;
    var bonm_err = true;
    var desc_err = true;
    var isbn_err = true;
    var auth_err = true;
    var ogp_err = true;

    // Original price validation
    $('#orgprice').keyup(function() {
        ogp_check();
    });

    function ogp_check() {
        var ogp_val = $('#orgprice').val();
        if (isNaN(ogp_val) || ogp_val.length == '') {
            $('#ogpchk').html("** NOT a valid Amount");
            $('#ogpchk').show();
            $('#ogpchk').css("color", "red");
            ogp_err = false;
        } else {
            $('#ogpchk').hide();
            ogp_err = true;
        }
    }

    // Author name validation
    $('#auth').keyup(function() {
        auth_check();
    });

    function auth_check() {
        var auth_val = $('#auth').val();
        if (auth_val.length < 3 || auth_val.length > 50) {
            $('#authchk').html("** NOT a valid Author name");
            $('#authchk').show();
            $('#authchk').css("color", "red");
            auth_err = false;
        } else {
            $('#authchk').hide();
            auth_err = true;
        }
    }

    // ISBN validation
    $('#isbn').keyup(function() {
        isbn_check();
    });

    function isbn_check() {
        var is_val = $('#isbn').val();
        if (isNaN(is_val) || is_val.length < 10 || is_val.length > 13) {
            $('#isbnchk').html("** NOT a valid ISBN number");
            $('#isbnchk').show();
            $('#isbnchk').css("color", "red");
            isbn_err = false;
        } else {
            $('#isbnchk').hide();
            isbn_err = true;
        }
    }

    // Book name validation
    $('#bookname').keyup(function() {
        bonm_check();
    });

    function bonm_check() {
        var bonm_val = $('#bookname').val();
        if (bonm_val.length == '' || bonm_val.length < 3 || bonm_val.length > 50) {
            $('#bonamchk').html("** Book name must be between 3-50 characters");
            $('#bonamchk').show();
            $('#bonamchk').css("color", "red");
            bonm_err = false;
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
        if (desc_val.length == '' || desc_val.length < 3 || desc_val.length > 200) {
            $('#deschk').html("** Book description must be between 3-200 characters");
            $('#deschk').show();
            $('#deschk').css("color", "red");
            desc_err = false;
        } else {
            $('#deschk').hide();
            desc_err = true;
        }
    }

    // Select validation
    function sel_chek() {
        var sel = $("#inputState1");
        if (sel.val() == "") {
            $('#selchk').html("** YOU need to select something");
            $('#selchk').show();
            $('#selchk').css("color", "red");
            sel_err = false;
        } else {
            $('#selchk').hide();
            sel_err = true;
        }
    }

    // Form submission validation
    $('#subtn').click(function(event) {
        sel_err = true;
        bonm_err = true;
        desc_err = true;
        isbn_err = true;
        auth_err = true;
        ogp_err = true;

        bonm_check();
        isbn_check();
        sel_chek();
        desc_check();
        auth_check();
        ogp_check();

        if (sel_err && bonm_err && desc_err && isbn_err && auth_err && ogp_err) {
            return true;
        } else {
            event.preventDefault();
            return false;
        }
    });
});
