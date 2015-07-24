<!doctype html>
<html lang="fr">
<head>
	<meta charset="iso-8859-1">
	<title>Administration</title>
	<link rel="stylesheet" href="js/jquery-ui.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="datepicker-fr.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
  <script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "-2m",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "-1m",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  $(function() {
    $( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );
    $( "#locale" ).change(function() {
      $( "#datepicker" ).datepicker( "option",
        $.datepicker.regional[ $( this ).val() ] );
    });
  });
  
  </script>
</head>
<body><center>
	<?php include("../sheets/facturation.php"); ?>

	<script>
		<?php include("../js/scripts.js"); ?>
	</script>


</body>
</html>