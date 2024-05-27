<?php
if(!$_SESSION['patient_loggedin']){
    header('Location: dashboard.php');
   exit;
}
?>

