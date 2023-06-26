<?php

session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/ind.php");
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
           
           .hamburger-menu {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }
.menu-icon {
            width: 30px;
            height: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-end;
            cursor: pointer;
        }

        .line {
            width: 100%;
            height: 3px;
            background-color: #333;
            transition: transform 0.3s ease;
        }

        .line-1 {
            transform-origin: top right;
        }
.line-3 {
            transform-origin: bottom right;
        }

        .menu-options {
            position: absolute;
            top: 70px;
            right: 0;
            background-color: #fff;
            padding: 20px;
            display: none;
            box-shadow: 0 0 10px rgb(137, 209, 233);
            width: 180px;
        }

        .menu-option {
            margin-bottom: 30px ;
            box-shadow: 0 0 10px  rgb(181, 206, 150);
        }

        .menu-options p {
            margin: 10px 0;
        } 

    </style>
</head>
<body>
    <header>
        <h1>CU Food Zone</h1>
        <div class="hamburger-menu">
            <div class="menu-icon">
                <div class="line line-1"></div>
                <div class="line"></div>
                <div class="line line-3"></div>
            </div>
            <div class="menu-options">
                <a href="http://localhost/Food-Ordering/food-order/foodCategory.php" style="text-decoration:none;color:black"><div class="menu-option">
                <p>Our Meals section has Cashew Nut salad, Steak,Kebab etc.</p></a>
            </div>
            <div class="menu-option"><a href="http://localhost/Food-Ordering/food-order/foodCategory.php" style="text-decoration:none;color:black">
                <p>Our Snack section has Tacos, Cheese Burger etc.</p></a>
            </div>
            <div class="menu-option">
            <a href="http://localhost/Food-Ordering/food-order/foodCategory.php" style="text-decoration:none;color:black">
                <p>Our Beverage section has Iced Americano, Latte etc.</p></a>
            </div>
            <div class="menu-option">
            <a href="http://localhost/Food-Ordering/food-order/foodCategory.php" style="text-decoration:none;color:black"><p>Our Dessert section has Choco Muffin, Pancake etc.</p></a>
            </div>
           

                

            </div>
        </div>
        <section class="food-search text-center">
            <div class="container">
                <form action="food-search.php" method="get">
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
            <a href="http://localhost/Food-Ordering/food-order/foodCategory.php"><img src="images/steakonfire.jpg" alt="Item 1"></a>
                <h2>Meals</h2>
                <p>this is meals </p>
            </div>
            <div class="menu-item">
            <a href="http://localhost/Food-Ordering/food-order/foodCategory.php"><img src="images/cashewnut.jpeg" alt="Item 1"></a>
                <h2>Snack</h2>
                <p>this is Snack </p>
            </div>
            <div class="menu-item">
            <a href="http://localhost/Food-Ordering/food-order/foodCategory.php"><img src="images/americano.jpg" alt="Item 1"></a>
                <h2>Beverage</h2>
                <p>this is Beverage </p>
            </div>
            <div class="menu-item">
            <a href="http://localhost/Food-Ordering/food-order/foodCategory.php"><img src="images/muffin.jpg" alt="Item 1"></a>
                <h2>Dessert</h2>
                <p>this is Dessert </p>
            </div>
        </div>
        <div class="cta">
            <a href="http://localhost/Food-Ordering/food-order/foodCategory.php">Order Now</a>
        </div>
    </div>
    <script>
        var hamburgerMenu = document.querySelector('.hamburger-menu');
        var menuOptions = document.querySelector('.menu-options');

        hamburgerMenu.addEventListener('click', function() {
            menuOptions.style.display = (menuOptions.style.display === 'block') ? 'none' : 'block';
            hamburgerMenu.classList.toggle('active');
        });
    </script>
</body>
</html>

