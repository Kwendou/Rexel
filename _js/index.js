$(document).ready(function(){

	$("#forgotten_password_link").click(function() {
		$("#forgotten_password_link").attr('href', 'forget_password.php?EMAIL='+$("#email").val());
	});

});