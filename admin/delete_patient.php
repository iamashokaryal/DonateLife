<?php
include ("../include/config.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from patient_reg where id= $id";
    $conn->query($sql);
}

header('location: manage_patients.php')

?>