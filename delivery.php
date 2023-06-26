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
    <title>Delivery Page</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
             background-color: #ecfced; 
        }
        header{
            background-color: lightblue;
            padding: 20px;
            text-align: center;
        }
        nav{
            background-color: gray;
            display: flex;
            justify-content: center;
        }
        nav a{
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        main{
            display: flex;
            justify-content: center;
            margin: 20px;
        }
        section{
            background-color: lightgray;
            padding: 20px;
            width: 30%;
        }
        
        .container{
            display: flex;
            flex-wrap: wrap;
        }

        #order{
            order: 1;
            width: 100%;
            padding: 20px;
            background-color: #f8f8f8;
            margin-bottom: 20px;

        }

        #delivery{
            order: 2;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            padding: 60px 0;
            margin-top: 20px;
            margin-bottom: 50px;
        }
       
        #order h2, #delivery h2{
            text-align: center;
            margin-bottom: 50px;
            font-size: 36px;
            font-weight: 700;
            text-transform: uppercase;
            color: #333;
        }
        .form-group{
            margin-bottom: 30px;
        }
        label{
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }
        .form-control{
            border: none;
            background-color: #e9e9e9;
            padding: 20px;
            font-size: 20px;
            color: #333;
            border-radius: 10px;
            width: 100%;
            margin-top: 10px;
        }
        .form-control:focus{
            outline: none;
            box-shadow: 0 0 0 2px #008080;
            background-color: #f5f5f5;
        }
        .delivery-form-group{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }
        .delivery-form-group label{
            width: 100%;
            margin-bottom: 5px;
        }
        .delivery-form-group input{
            width: 100%;
            margin-bottom: 10px;
        }
        footer{
            background-color: gray;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Delivery Page</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#order">Order</a></li>
            <li><a href="#delivery">Delivery</a></li>
        </ul>
    </nav>
    <main>
    <div class="container">
    <div class="form-wrapper">
        <section id="order">
            <h2>Order Information</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>

             </div> 
             <div class="form-group"> 
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>

             </div> 
             <div class="form-group"> 
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>

             </div> 
             <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="form-control" required> </textarea>
             </div> 
        </section>

        <section id="delivery">
            <div class="container">
            <h2>Delivery Information</h2>
            <div class="form-group delivery-form-group">
                <label for="delivery-name">Delivery Name</label>
                <input type="text" id="delivery-name" name="delivery-name" class="form-control" required>
                <label for="delivery-time">Delivery Time</label>
                <input type="time" id="delivery-time" name="delivery-time" class="form-control" required>
            </div>

            </div>
        </section>
    </div>
</div>
        

    </main>
    <footer>
        <p>&copy;2023 Delivery Page</p>
    </footer>
    
</body>
</html>