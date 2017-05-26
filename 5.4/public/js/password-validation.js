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

    //BASIC check to see if passwords match

    //$('#password, #password_confirmation').on('keyup', function () {
    //  if ($('#password').val() == '' && $('#password_confirmation').val() == '') {
    //    $('#message').html('');
    //  } else
    //  if ($('#password').val() == $('#password_confirmation').val()) {
    //    $('#message').html('Passwords Match!').css('color', 'green');
    //  } else 
    //    $('#message').html('Passwords Do Not Match!').css('color', 'red');
    //});

    //More thorough check to ensure passwords match as well as the strength of the password
    $(document).ready(function() {
        var password1       = $('#password'); //id of first password field
        var password2       = $('#password_confirmation'); //id of second password field
        var passwordsInfo   = $('#pass-info'); //id of indicator element
        
        passwordStrengthCheck(password1,password2,passwordsInfo); //call password check function
        
    });

    function passwordStrengthCheck(password1, password2, passwordsInfo)
    {
        //Must contain 6 characters or more
        var WeakPass = /(?=.{6,}).*/; 
        //Must contain lower case letters and at least one digit.
        var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{6,}$/; 
        //Must contain at least one upper case letter, one lower case letter and one digit.
        var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{6,}$/; 
        //Must contain at least one upper case letter, one lower case letter and one digit.
        var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{6,}$/; 
        
        $(password1).on('keyup', function(e) {
            if(VryStrongPass.test(password1.val()))
            {
                passwordsInfo.removeClass().addClass('vrystrongpass').html("Very Strong! (Please don't forget your password now!)").css({'color':'green', 'font-size':'13px'});
            }   
            else if(StrongPass.test(password1.val()))
            {
                passwordsInfo.removeClass().addClass('strongpass').html("Strong! (Enter special chars to make it even stronger)").css({'color':'green', 'font-size':'13px'});
            }   
            else if(MediumPass.test(password1.val()))
            {
                passwordsInfo.removeClass().addClass('goodpass').html("Good! (Enter an uppercase letter to make it stronger)").css({'color':'green', 'font-size':'13px'});
            }
            else if(WeakPass.test(password1.val()))
            {
                passwordsInfo.removeClass().addClass('stillweakpass').html("Still Weak! (Enter digits to make a good password)").css({'color':'green', 'font-size':'13px'});
            }
            else
            {
                passwordsInfo.removeClass().addClass('weakpass').html("Very Weak! (Must be 6 or more chars)").css({'color':'red', 'font-size':'13px'});
            }
        });
        
        $(password2).on('keyup', function(e) {
            
            if(password1.val() !== password2.val())
            {
                passwordsInfo.removeClass().addClass('weakpass').html("Passwords do not match!").css({'color':'red', 'font-size':'13px'});
            }else{
                passwordsInfo.removeClass().addClass('goodpass').html("Passwords match!").css({'color':'green', 'font-size':'13px'});
            }
                
        });
    }    

});