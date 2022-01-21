<?php
    if (!isset($_SESSION["authUser"])) {
        print_r($_SESSION);
        print "session not set";
    }
?>