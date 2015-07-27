<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>
		<form method="post" class="form-signin" role="form" action="index.php">  
				
			<input name="email" id="email" type="email"  placeholder="Email address">
		
                    <button type="submit">index</button>
                    
                </form>

