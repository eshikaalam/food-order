<?php
session_start();

$_SESSION = array();
session_destroy();

header("location: http://localhost/Food-Ordering/FOOD-ORDER/index.php");
?>