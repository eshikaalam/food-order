<?php

session_start();
 if(!isset($_SESSION['admin_email']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/student-login/adminlogin.php");
    exit;
    }
?>
<?php
  require_once('./operationsUpdate.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add food</title>
    <script src="https://kit.fontawesome.com/18777b3f13.js" crossorigin="anonymous"></script>
    
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
        .manage-container{
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        .manage-form{
            display: flex;
            flex-direction: column;
            width: 50%;
        }
        .manage-form input{
            margin-top: 1em;
            font-size: 1.5em;
            padding: 5px 10px;
        }
        .manage-form input[type="submit"]{
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
   <div class="d-flex justify-content-center">
   <a href="http://localhost/Food-Ordering/food-order/home.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; height: 60px; width: 100px;">Home</button></a>
   <a href="http://localhost/Food-Ordering/food-order/index.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; margin-left: 60px; height: 60px; width: 100px;">Index</button></a>
   <a href="http://localhost/Food-Ordering/food-order/addfood.php"><button type="submit" class="btn btn-outline-warning" style="margin-top: 35px; margin-left: 60px; height: 60px; width: 100px;">Add</button></a>
   <a href="http://localhost/Food-Ordering/food-order/meals.php"><button type="submit" class="btn btn-outline-danger" style="margin-top: 35px; margin-left: 60px; height: 60px; width: 100px;">Delete</button></a>
   </div>
    <section class="manage-container">
        <form style="margin-top: 10px;" class="manage-form" action="meals.php" method="post" enctype="multipart/form-data">
            <?php  
               inputFields("foodid","food_id","","number");
               ?>
            <?php  
               inputFields("foodname","food_name","","text");
               ?>
               <?php
               inputFields("foodprice","food_price","","number");
               ?>
               <?php
               inputFields("","file","","file");
               ?>

         
            <button type="submit" class="btn btn-success mx-auto" name="update" style="margin-top: 25px; height: 60px; width: 100px;">Update</button>        
                    
        </form>
    </section>


?>
         
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>