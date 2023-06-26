<?php
require_once "config.php";

$s_id = $s_name = $s_email = $s_password = $s_phone = '';
$s_id_err = $s_name_err = $s_email_err = $s_password_err = $s_phone_err = '';

 if($_SERVER['REQUEST_METHOD'] == "POST"){
        $sql = "SELECT s_id FROM student WHERE s_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_s_id);

            //set the value of param username
            $param_s_id = trim($_POST['s_id']);

            //execute the statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $s_id_err = "This student ID is already used";
                    echo $s_id_err;
                }
                else{
                    $s_id = trim($_POST['s_id']);
                }
            }
            else{
                echo "something went wrong";
            }
        }

    if(empty(trim($_POST['s_name']))){
        $s_name_err = "student name can not be blank";
        }
         else if(strlen(trim($_POST['s_name'])) < 6){
        $s_name_err = "name should be at least 6 characters";
        echo $s_name_err;
         }
        else{
           $s_name = trim($_POST['s_name']);
        }

        if(empty(trim($_POST['s_email']))){
            $s_email_err = "email can not be blank";
            }
           
            else{
               $s_email = trim($_POST['s_email']);
            }

if(empty(trim($_POST['s_password']))){
     $s_password_err = "password can not be blank";
     }
     else if(strlen(trim($_POST['s_password'])) < 6){
        $s_password_err = "password can not be less than 6 characters";
        echo $s_password_err;
     }
     else{
        $s_password = trim($_POST['s_password']);
     }

     if(strlen(trim($_POST['s_phone'])) < 11){
        $s_phone_err = "Enter correct phone number";
        echo $s_phone_err;
     }
     else{
        $s_phone = trim($_POST['s_phone']);
     }

     // if there were no errors, insert data into database

     if(empty($s_id_err) && empty($s_password_err) && empty($s_name_err) && empty($s_email_err) && empty($s_phone_err)){
        $sql = "INSERT INTO  student(s_id,s_name,s_email,s_password,s_phone) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"sssss",$param_s_id, $param_s_name,$param_s_email,$param_s_password,$param_s_phone);

            //set these parameters

            $param_s_id = $s_id;
            $param_s_name = $s_name;
            $param_s_email = $s_email;
            $param_s_password = password_hash($s_password,PASSWORD_DEFAULT);
            $param_s_phone = $s_phone;

            //try to execute the query

            if(mysqli_stmt_execute($stmt))
            {
                session_start();
                $_SESSION["loggedin"] = true;
                header("location: http://localhost/Food-Ordering/food-order/home.php");
            }

            else{
                echo "something went wrong... can not redirect";
            }

        }
    }
        mysqli_stmt_close($stmt);
     }
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Register</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1 style="color: green; margin-top: 30px;">Sign-up Now</h1>
        <form class="form" action="register.php" method="post">
            <input type="text" name="s_id" id="s_id" placeholder="Enter your student Id">
            <input type="text" name="s_name" id="s_name" placeholder="Enter your name">
            <input type="email" name="s_email" id="s_email" placeholder="Enter your email">
            <input type="password" name="s_password" id="s_password" placeholder="Enter your password">
            <input type="text" name="s_phone" id="s_phone" placeholder="Enter your phone number">
            <button class="btn">Sign-up</button>
        </form> 
        <p class="register-para">already have an account? <a href="http://localhost/Food-Ordering/food-order/student-login/login.php" target = "-blank">Login now</a></p>
        <script src="register.js"></script>
    </div>
    
</body>
</html>
