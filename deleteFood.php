<?php
    require_once 'auth_check.php';
?>
<?php

session_start();
 if(!isset($_SESSION['admin_email']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/student-login/adminlogin.php");
    exit;
    }
?>

<?php
include('./config.php');


?>
<?php
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];


    $sql = "delete from `food` where food_id = $id";

    $result = mysqli_query($conn,$sql);
    if($result){
        header("location: http://localhost/Food-Ordering/FOOD-ORDER/meals.php");
    }
    else{
        die(mysqli_error($conn));
    }
}

?>