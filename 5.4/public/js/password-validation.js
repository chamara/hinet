jQuery(document).ready(function($){
    //mask/unmask password attribute
    $('#password').password().on('show.bs.password', function(e) {
        $('#eventLog').text('On show event');
        $('#methods').prop('checked', true);
    }).on('hide.bs.password', function(e) {
                $('#eventLog').text('On hide event');
                $('#methods').prop('checked', false);
            });
    $('#methods').click(function() {
        $('#password').password('toggle');
    });

    //mask/unmask confirm_password attribute
    $('#confirm_password').password().on('show.bs.password', function(e) {
        $('#eventLog').text('On show event');
        $('#methods').prop('checked', true);
    }).on('hide.bs.password', function(e) {
                $('#eventLog').text('On hide event');
                $('#methods').prop('checked', false);
            });
    $('#methods').click(function() {
        $('#confirm_password').password('toggle');
    });

    //Check to ensure confirm_password attribute matches password attribute
    $('#password, #confirm_password').on('keyup', function () {
      if ($('#password').val() == '' && $('#confirm_password').val() == '') {
        $('#message').html('');
      } else
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Passwords Match!').css('color', 'green');
      } else 
        $('#message').html('Passwords Do Not Match!').css('color', 'red');
    });

});