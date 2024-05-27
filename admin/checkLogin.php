<?php

if(!$_SESSION['admin_loggedin']){
    header('Location: login.php');
   exit;
}
?>