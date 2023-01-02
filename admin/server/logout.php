<?php
session_start();
unset($_SESSION["isAdminLoggedIn"]);

header("location:../index.php");

?>