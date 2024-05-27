<?php
if(!$_SESSION['patient_loggedin']){
    header('Location: login.php');
   exit;
}
?>