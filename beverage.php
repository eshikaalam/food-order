<?php

session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/ind.php");
    exit;
    }

?>
<?php

include('./config.php');


if(isset($_POST['submit'])){
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $image = $_FILES['file'];

    $imagefilename = $image['name'];
    $imagefileerror = $image['error'];
  
    $imagefiletemp = $image['tmp_name'];
    
    $filename_separate =explode('.',$imagefilename);
      
    $file_extension = strtolower(end($filename_separate));

    $extension = array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image = 'foodimage/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql = "insert into `food`(food_name,food_price,food_image) values ('$food_name','$food_price','$upload_image')";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo '<div class="alert alert-success" role="alert">
            Data inserted Successfully;
          </div>';
        }
        else{
            die(mysqli_error($conn));
        }
    }

}

?>



<?php

if(isset($_POST['update'])){
    $id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $image = $_FILES['file'];

    $imagefilename = $image['name'];

    $imagefileerror = $image['error'];
  
    $imagefiletemp = $image['tmp_name'];
    
    $filename_separate =explode('.',$imagefilename);
      
    $file_extension = strtolower(end($filename_separate));

    $extension = array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image = 'foodimage/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql = "update `food`set food_id = $id, food_name = '$food_name', food_price = '$food_price', food_image = '$upload_image' where food_id = $id";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo '<div class="alert alert-success" role="alert">
            Data updated Successfully;
          </div>';
        }
        else{
            die(mysqli_error($conn));
        }
    }

}

?>



 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meals Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
     body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        } 
        .container{
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header{
            background-color: rgb(165, 141, 136);
            color: #ffcfa4;
            padding: 20px;
            text-align: center;
            
        }
.head{
    background-color: rgb(58, 159, 58);
    border-radius: 3px;
    height: 40px;
    padding: 10px;
    margin-bottom: 20px;
    color: white;
    display: flex;
    align-items: center;
}
   
        #meals{
            padding: 40px 0;
            background-color: rgb(184, 162, 156);
            background-image: url("images/steakonfire.jpg");
            background-repeat: no-repeat;
            background-size: cover; 
        }
        .meals-item{
            background-color: #f9cbae;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .meals-item:hover{
         box-shadow: 0 0 20px #333;
         transform: translateY(-5px);
       }
        .meals-item img{
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }
        .meals-item h2{
            font-size: 24px;
            margin-bottom: 10px;
        }
        .meals-item p{
            margin-bottom: 10px;
        }
        .meals-item .price{
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .meals-item button{
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .meals-item button:hover{
            background-color: #fff;
            color: #333;
        }
        footer{
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center mb-5">
   <a href="http://localhost/Food-Ordering/food-order/home.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; height: 60px; width: 100px;">Home</button></a>
   <a href="http://localhost/Food-Ordering/food-order/index.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; margin-left: 60px; height: 60px; width: 100px;">Index</button></a>
   </div>
<header class="mb-5">
<div class="header">
        <p class="logo">Menu</p>
    </div>
    </header> 
    <?php

        $sql = "select * from `food`";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['food_id'];
            $name = $row['food_name'];
            $image = $row['food_image'];
            $price = $row['food_price'];
            echo '<div class="container d-flex">
            <div class="meals-item">
            <p><img src= "'.$image.'"/></p>
                <h2>'.$name.'</h2>
                <p>Description of the meals goes here. From this section you can
                    add your favorite meals to your cart as many as you like</p>
                    <p class="price">'.$price.' tk</p>
                    <button>Add to cart</button>
                    <button><a href="deleteFood.php?deleteid='.$id.'" class="text-white text-decoration-none"> Delete</a></button>
                    
            </div>';
        }
     
    ?>
 
    <footer>
        <p>&copy; 2023 CU Food-Zone</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>