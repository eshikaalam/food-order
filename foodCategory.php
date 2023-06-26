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
    <title>Food Categories</title>
      <!-- bootstrap css -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="styles/categories.css">
</head>
<body>
    <header>
        <h1> Food Categories </h1>
    </header>
    <div class="d-flex justify-content-center mb-5">
   <a href="http://localhost/Food-Ordering/food-order/home.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; height: 60px; width: 100px;">Home</button></a>
   <a href="http://localhost/Food-Ordering/food-order/index.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; margin-left: 60px; height: 60px; width: 100px;">Index</button></a>
</div>
    <nav>
        <ul>

             <li>
                <a href="meals.php">

                    <button style="color: antiquewhite;" class="ms-5 btn btn-outline-success" type="consultation">The   Food   Menu</button>
                    </a> 
            </li>
        
            
        </ul>
    </nav>

    <main>
         <section id="meals">
            <h2>Meals</h2>
            <p>In 'The Food Menu' you can find various meals such as Cashew Nut salad, Steak,Kebab etc.
             A well-cooked meals can enhance the dining experience and satisfy the customer's cravings.</p>
        </section>
        <section id="snack">
            <h2>Snack</h2>
            <p>In 'The Food Menu' you can find various snacks such as Tacos, Cheese Burger etc.
                A well-cooked snack can enhance the dining experience and satisfy the customer's cravings.</p>
        </section>
        <section id="beverage">
            <h2>Beverage</h2>
            <p>In 'The Food Menu' you can find various beverages such as Iced Americano, Latte etc.
                A well-prepared beverage can enhance the dining experience and satisfy the customer's cravings.</p>
        </section>  
        <section id="dessert">
            <h2>Dessert</h2>
            <p>In 'The Food Menu' you can find various desserts such as Muffin, Pancake etc.
                A well-prepared dessert can enhance the dining experience and satisfy the customer's cravings.</p>
        </section> 

    </main>
    <footer>
        <p>Copyrights and &copy; 2023 Food Categories</p>
    </footer>
     <!-- bootstrap js -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>