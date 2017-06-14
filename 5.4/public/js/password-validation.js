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
    //$('#password_confirmation').password().on('show.bs.password', function(e) {
    //    $('#eventLog').text('On show event');
    //    $('#methods').prop('checked', true);
    //}).on('hide.bs.password', function(e) {
    //            $('#eventLog').text('On hide event');
    //            $('#methods').prop('checked', false);
    //        });
    //$('#methods').click(function() {
    //    $('#password_confirmation').password('toggle');
    //});


    //Password Strength and check to ensure passwords match
    $(document).ready(function() {
        var password1       = $('#password'); //id of first password field
        var password2       = $('#password_confirmation'); //id of second password field
        var passwordsInfo   = $('#result'); //id of indicator element
        
        passwordStrengthCheck(password1,password2,passwordsInfo); //call password check function
        
    });

    function passwordStrengthCheck(password1, password2, passwordsInfo)
    {
        //Must contain 6 characters or more
        var WeakPass = /(?=.{6,}).*/;
        //Must contain 6 characters of lower case letters and at least one digit.
        var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{6,}$/;
        //Must contain 6 characters of at least one upper case letter, one lower case letter and one digit.
        var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{6,}$/;
        //Must contain 6 characters of at least one upper case letter, one lower case letter, one digit and one non-alphanumeric character.
        var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{6,}$/;
        
        $(password1).on('keyup', function(e) {
            if(password1.val() == '')
            {
                passwordsInfo.removeClass().addClass('weakpass').html("Please specify a password.").css({'color':'red', 'font-size':'13px'});
                password.setCustomValidity("Please specify a password");
                if (password2.val() !== '') {
                    password2.val('');
                }
            }
            else if(VryStrongPass.test(password1.val()))
            {
                passwordsInfo.removeClass().addClass('vrystrongpass').html("Very Strong Password!").css({'color':'green', 'font-size':'13px'});
                password.setCustomValidity("");
                if (password2.val() !== '') {
                    password2.val('');
                }                
            }   
            else if(StrongPass.test(password1.val()))
            {
                passwordsInfo.removeClass().addClass('strongpass').html("Strong Password!").css({'color':'green', 'font-size':'13px'});
                password.setCustomValidity("");
                if (password2.val() !== '') {
                    password2.val('');
                }                
            }   
            else if(MediumPass.test(password1.val()))
            {
                passwordsInfo.removeClass().addClass('goodpass').html("Good Password!").css({'color':'green', 'font-size':'13px'});
                password.setCustomValidity("");
                if (password2.val() !== '') {
                    password2.val('');
                }                
            }
            else if(WeakPass.test(password1.val()))
            {
                if(password1.val().match(/^\d+$/)) {
                    passwordsInfo.removeClass().addClass('stillweakpass').html("Weak Password! (Enter letters to make it stronger)").css({'color':'green', 'font-size':'13px'});
                }
                else {
                    passwordsInfo.removeClass().addClass('stillweakpass').html("Weak Password! (Enter digits to make it stronger)").css({'color':'green', 'font-size':'13px'});
                }
                password.setCustomValidity("");
                if (password2.val() !== '') {
                    password2.val('');
                }                
            }
            else
            {
                passwordsInfo.removeClass().addClass('weakpass').html("Password must be 6 or more characters").css({'color':'red', 'font-size':'13px'});
                password.setCustomValidity("Password must be 6 or more characters");
                if (password2.val() !== '') {
                    password2.val('');
                }                
            }
        });
        
        $(password2).on('keyup', function(e) {

            if(password1.val() !== password2.val())
            {
                //if(WeakPass.test(password1.val())) --doesn't work                
                if (password1.val().length < 6)
                {
                    passwordsInfo.removeClass().addClass('weakpass').html("Password must be 6 or more characters").css({'color':'red', 'font-size':'13px'});
                    password.setCustomValidity("Password must be 6 or more characters");
                }
                else
                {
                    passwordsInfo.removeClass().addClass('weakpass').html("Passwords do not match!").css({'color':'red', 'font-size':'13px'});
                    password_confirmation.setCustomValidity("Passwords Don't Match");
                }
            }
            else
            {
                if (password1.val().length < 6)
                //if(WeakPass.test(password1.val())) --doesn't work
                {
                    passwordsInfo.removeClass().addClass('weakpass').html("Password must be 6 or more characters").css({'color':'red', 'font-size':'13px'});
                    password.setCustomValidity("Password must be 6 or more characters");
                }
                else
                {
                    passwordsInfo.removeClass().addClass('weakpass').html("Passwords match!").css({'color':'green', 'font-size':'13px'});
                    password_confirmation.setCustomValidity("");
                }
            }
        });
    }
});