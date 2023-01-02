<?php
session_start();
if(isset($_SESSION["isAdminLoggedIn"])) 
    header("location:dashboard.php");
?>