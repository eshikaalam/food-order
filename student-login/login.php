<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
    <script src="https://kit.fontawesome.com/18777b3f13.js" crossorigin="anonymous"></script>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b94379aac3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/loginstyle.css">
 
    <style>
        nav{
            display: flex;
            justify-content: space-between;
        }
        nav a{
            text-decoration: none;
            color: black;
            margin-right: 10px;
        }
        .login-container{
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        .login-form{
            display: flex;
            flex-direction: column;
            width: 50%;
        }
        .login-form input{
            margin-top: 1em;
            font-size: 1.5em;
            padding: 5px 10px;
        }
        .login-form input[type="submit"]{
            background-color: rgb(101, 155, 19);
            border: 0;
            border-radius: 5px;
            color: whitesmoke;
            font-weight: 700;
        }
        .btn a{
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <section class="login-container">
        <form style="margin-top: 25px;" class="login-form" action="" method="POST">
            <h3 class="text-center text-success">Please Log In</h3> <!-- as h3 is a block , it will show in different block or line -->
            <input type="email" name="s_email" id="" placeholder="Enter email" required> 
            <input type="password" name="s_password" id=""placeholder="Enter Password" required> 
             <button type="submit" class="btn btn-success mx-auto" style="margin-top: 25px; height: 60px; width: 100px;">Login</button>
            
        </form>
        </section>
        <section>
        <div style="text-align: center;" class="signups">
            
                <h3 style="margin-top: 74px;" class="sign-active">If you don't have an account </h3>

                <button style="margin-top: 25px;" class="mx-auto btn btn-outline-success" type="consultation"><a href="http://localhost/Food-Ordering/food-order/student-register/register.php" target="_blank">Sign Up</a></button>

          </div> 
    </section>
          <!-- bootstrap js -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
// session_start();

if(isset($_SESSION['s_email']))
{
    header("location: http://localhost/Food-Ordering/food-order/ind.php");
    exit;
}

require_once "config.php";

$s_email = $s_password = $hashed_password = "";
$err = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
     if(empty(trim($_POST['s_email'])) || empty(trim($_POST['s_password'])))
     {
        $err = "please enter user email and password";
     }

     else{
        $s_email = trim($_POST['s_email']);
        $s_password = trim($_POST['s_password']);
     }

     if(empty($err)){
        $sql = "SELECT  s_id,s_email,s_password FROM student WHERE s_email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt,"s",$param_s_email);
        $param_s_email = $s_email;
       
//execute the statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt,$s_id,$s_email,$hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($s_password,$hashed_password)){
                            //this means user is allowed to login
                             session_start();
                            $_SESSION["s_id"] = $s_id;
                            $_SESSION["s_email"] = $s_email;
                            $_SESSION["loggedin"] = true;

                            //redirect user to homepage
                            header("location: http://localhost/Food-Ordering/food-order/ind.php");
                            

                        }
                    }
                }
     }
    }
}

?> 






