<?php

session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/index.php");
    exit;
    }
?>
<?php

require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body{
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            /* background-image: url("images/foody.jpg"); */
            background-repeat: no-repeat;
            background-size: cover; 
            opacity: 0.9;
            background-position: center;
        }
        header{
            background-color: rgba(193, 245, 195, 0.847);
            padding: 20px;
            text-align: center;
        }
        h1{
            margin: 0;
            font-size: 30px;
            font-weight: normal;
        }
        .container{
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }
        .menu{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .menu-item{
            width: 30%;
            margin: 50px 3.33%;
            padding: 20px;
            border: 11px solid rgba(164, 164, 164, 0.906);
            border-radius: 11px;
            text-align: center;
            color: black;
        }
        .menu-item img{
            max-width: 100%;
        }
        .menu-item h2{
            margin-top: 0;
            font-size: 34px;
        }
        .menu-item p{
            margin-bottom: 0;
            font-size: 16px;
        }
        .menu-item:hover{
         box-shadow: 0 0 20px #333;
         transform: translateY(-5px);
         background-color: #bbdfbc;
         color: rgb(163, 24, 24);
       }
        .cta{
            text-align: center;
            margin-top: 26px;
            margin-bottom: 60px;
        }
        .cta a{
            display: inline-block;
            padding: 20px 40px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .cta a:hover{
            background-color: #4CAF50;
        }
        .search-input{
            margin-top : 10px;
            height : 35px;
            width : 200px;
        }
        .btn{
            height : 30px;
            font-size : 20px;
            background-color : gray;
            color : white;

        }   

    </style>
</head>
<body>
    <header>
        <h1>CU Food Zone</h1>
        <section class="food-search text-center">
            <div class="container">
                <form action="food-search.php" method="POST">
                    <input class="search-input" type="search" name="search" required>
                    <input class="btn" type="submit" name="submit" value="search">
                </form>

            </div>

        </section>
    </header>
    <div class="container">
        <h2>Featured Items</h2>
        <div class="menu">
            <div class="menu-item">
                <img src="images/steakonfire.jpg" alt="Item 1">
                <h2>Meals</h2>
                <p>this is meals </p>
            </div>
            <div class="menu-item">
                <img src="images/cashewnut.jpeg" alt="Item 1">
                <h2>Snack</h2>
                <p>this is meals </p>
            </div>
            <div class="menu-item">
                <img src="images/americano.jpg" alt="Item 1">
                <h2>Beverage</h2>
                <p>this is meals </p>
            </div>
            <div class="menu-item">
                <img src="images/muffin.jpg" alt="Item 1">
                <h2>Dessert</h2>
                <p>this is meals </p>
            </div>
        </div>
        <div class="cta">
            <a href="http://localhost/Food-Ordering/food-order/foodCategory.php">Order Now</a>
        </div>
    </div>
</body>
</html>