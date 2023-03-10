
<?php

session_start();
 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/index.php");
    exit;
    }
?>
<?php
require_once "config.php";
    $search = $_POST['search'];

    $sql = "SELECT *"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <style>
        body{
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-size: cover; 
            opacity: 0.9;
            background-position: center;
        }
        header{
            background-color: antiquewhite;
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
            border: 11px solid #f67d7d;
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
        <h1 style = "font-weight:bolder;color:gray">Search Result</h1>
    </header>
    
</body>
</html>
