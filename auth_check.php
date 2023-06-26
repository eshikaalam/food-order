<?php

if(!isset($_SESSION['admin_email'])){
    header("location: student-login/adminlogin.php");
}
?>