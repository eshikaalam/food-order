
<?php

session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/ind.php");
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <script src="https://kit.fontawesome.com/18777b3f13.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-size: cover; 
            opacity: 0.9;
            background-position: center;
        }
        header{
            background-color: white;
            padding: 20px;
            text-align: center;
        }
        h1{
            margin: 0;
            font-size: 30px;
            font-weight: normal;
        }
        
        .menu-item{
            width: 30%;
            margin: auto;
            padding: 20px;
            border: 11px solid dark;
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
        .cart{
            background-color: lightgray;
            margin-left: auto;
        }
    </style>
</head>
<body>


    <header>
        <h1 style = "font-weight:bolder;color:white;background-color:gray"><i class="fa-solid fa-magnifying-glass"></i>  Search Results For <?php echo $_GET['search']?></h1>
        </header>
      <div class= "container row d-flex justify-content-center mx-auto"> 
      <?php

      include('./config.php');
        $count = 0;
            if(isset($_SESSION['cart']))
            {
                $count = count($_SESSION['cart']);
            }

        ?>
         <a href="mycart.php" style="text-decoration:none"><div class="cart d-flex gap-1 rounded-3 align-items-center mt-2 justify-content-center"><i class="fa-solid fa-cart-arrow-down fa-2x text-dark"></i><p style="font-size:25px; font-weight: 500" class="text-dark">My Cart (<?php echo $count  ?>)</p></div></a>
        <?php
        $noresults = true;
$query = $_GET["search"];
$sql = "SELECT * FROM food WHERE match(food_name,food_image) against('$query')";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $name = $row['food_name'];
    $desc = $row['food_image'];
    $id = $row['food_id'];
    $price = $row['food_price'];
    $url = "meals.php?food_id=".$id;
    $noresults = false;
    echo '<div class="menu-item border border-dark border-opacity-50 mt-5">
    <a href="' .$url. '"><img src="' .$desc. '" alt="Item 1"></a>
        <h2>' .$name. '</h2>
        <form  action="manage_cart.php" method="POST">
        <p class="price h1 mb-2" id="price-tag">'.$price.' tk</p>
        <input type="hidden" name="food_price" id="food_price" value = '.$price.'> 
        <input type="hidden" name="food_name" id="food_name" value = '.$name.'>
        <input type="submit" name = "add_to_cart" class="add" value = "Add to Cart" id='.$id.'>
        </form>
    </div>';
}

if($noresults){
    echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p class="display-4">No Results to show</p>

        </div>

    </div>';
}
?>

</div>
        <div class="cta">
            <div class="mb-5">
            <a href="http://localhost/Food-Ordering/food-order/meals.php">Show Menu</a>
        </div>
            <div>
       
        </div>
        </div>

        
    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>     
</body>
</html>



