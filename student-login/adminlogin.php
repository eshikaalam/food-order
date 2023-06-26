<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    header("location: http://localhost/Food-Ordering/food-order/addfood.php");
    exit;
}

?>

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
        .form-lebel{
            font-size : 20px;
            color : green;
            font-weight : bold;
        }
        .form-select{
            height : 50px;
            /* width : 300px; */
            border : 1px solid gray;
            border-radius : 4px;
            font-size : 20px;
            font-weight : 500;
            color : gray;
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
            <input type="email" name="a_email" id="" placeholder="Enter email" required> 
            <input type="password" name="a_password" id=""placeholder="Enter Password" required> 
            <input type="submit" name="login" value = "Login" class="btn"> 
             
            
        </form>
        </section>
          <!-- bootstrap js -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php

include("connection.php");
if(isset($_POST['login']))
{
    $a_email = $_POST['a_email'];
    $a_password = $_POST['a_password'];

    $query = "SELECT * FROM admin WHERE a_email = '$a_email' && a_password = '$a_password' ";
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);
    
    if($total == 1){
       $_SESSION['admin_email'] = $a_email;
       $_SESSION["loggedin"] = true;
       header("location: http://localhost/Food-Ordering/FOOD-ORDER/addfood.php");
    }

    else {
        echo "login failed";
    }


}


?> 