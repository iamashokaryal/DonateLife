<?php
if(!$_SESSION['donor_loggedin']){
    header('Location: dashboard.php');
   exit;
}
?>