<?php if( !empty( $error )){ ?>
	<div class="message_error message_div">
		<p class="text-center"> <?php echo $error; ?> </p>
	</div>
<?php } ?>

<?php if( !empty( $success )){ ?>
	<div class="message_success message_div">
		<p class="text-center"> <?php echo $success; ?> </p>
	</div>
<?php } ?>

<?php if( !empty( $success ) || !empty( $error ) ){ ?>
	<script>
		$(document).ready(function(){
			var txtVal = $('.message_div').html();
			var chars = txtVal.length;
			if (chars > 100) {
				$('.message_div').delay(15000).slideUp();
			} else {
				$('.message_div').delay(5000).slideUp();
			}
		});
    </script>
<?php } ?>