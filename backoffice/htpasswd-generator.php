<?php
/**
 * Created by Thibaud BARDIN (Irvyne)
 * This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)
 */

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $encryptedPassword = crypt($password, base64_encode($password));

    echo $username.':'.$encryptedPassword;
}
?>
<form method="post">
    <input type="text" name="username" placeholder="username..." required>
    <input type="password" name="password" placeholder="password..." required>
    <input type="submit" value="Htpasswd Generator!">
</form>