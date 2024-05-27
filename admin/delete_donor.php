<?php
include ("../include/config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE from donor_reg where id= $id";
    $conn->query($sql);
}
header('location: manage_donors.php')
?>