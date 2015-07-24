<?php

    header('WWW-Authenticate: Basic realm="Section Administration !"');
    header('HTTP/1.0 401 Unauthorized');
    exit();

?>