$(document).ready(function(){
	
	$("#register-form").validate({
		submitHandler : function(e) {
		    $(form).submit();
		},
		rules : {
			nom : {
				required : true
			},
			prenom : {
				required : true
			},
			rue : {
				required : true
			},
			numero : {
				required : true
			},
			cp : {
				required : true
			},
			localite : {
				required : true
			},
			pays : {
				required : true
			},
			telephone : {
				required : true
			},
			gsm : {
				required : true
			},

			email : {
				required : true,
				email: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function() {
							return $( "#email" ).val();
						}
					}
				}
			},
			password : {
				required : true
			},
			confirm_password : {
				required : true,
				equalTo: "#password"
			}
		},
		messages : {
			nom : {
				required : "Encodez un nom SVP"
			},
			prenom : {
				required : "Encodez un prénom SVP"
			},
			rue : {
				required : "Encodez une adresse SVP"
			},
			numero : {
				required : "Encodez un numéro SVP"
			},
			cp : {
				required : "Encodez un code postal SVP"
			},
			localite : {
				required : "Encodez une localité SVP"
			},
			pays : {
				required : "Encodez un pays SVP"
			},
			telephone : {
				required : "Encodez un n° de téléphone SVP"
			},
			gsm : {
				required : "Encodez un n° de GSM SVP"
			},
			email : {
				required : "Encodez une adresse email SVP",
				remote : "L'adresse email existe déjà "
			},
			password : {
				required : "Entrez un mot de passe SVP"
			},
			confirm_password : {
				required : "Confirmez votre mot de passe SVP",
				equalTo: "Le mot de passe encodé ne correspond pas"
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
	
	
});