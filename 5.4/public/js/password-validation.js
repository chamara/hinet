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

    //mask/unmask password_confirmation attribute
    $('#password_confirmation').password().on('show.bs.password', function(e) {
        $('#eventLog').text('On show event');
        $('#methods').prop('checked', true);
    }).on('hide.bs.password', function(e) {
                $('#eventLog').text('On hide event');
                $('#methods').prop('checked', false);
            });
    $('#methods').click(function() {
        $('#password_confirmation').password('toggle');
    });

    //ensure password_confirmation matches password
    $('#password, #password_confirmation').on('keyup', function () {
      if ($('#password').val() == '' && $('#password_confirmation').val() == '') {
        $('#message').html('');
      } else
      if ($('#password').val() == $('#password_confirmation').val()) {
        $('#message').html('Passwords Match!').css('color', 'green');
      } else 
        $('#message').html('Passwords Do Not Match!').css('color', 'red');
    });

});