$(document).ready(function(){
	$("#login-form").validate({
		submitHandler : function(e) {
		    $(form).submit();
		},
		rules : {
			email : {
				required : true,
				email: true,
				remote:"check-email.php"
			}
		},
		messages : {
			email : {
				required : "Encodez une adresse email",
				remote : "L'adresse email n'existe pas"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});

//////////////////////////////////////////////
// Transférer E-MAIL à "forget_password.php //
//////////////////////////////////////////////

	
	document.getElementById("email").onchange = email_change;


	function email_change() {
		
		$("#forgotten_password_link").attr('href', 'forget_password.php?EMAIL='+$("#email").val());
	}	
	
});