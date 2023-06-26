<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/ind.php");
    exit;
    }

?>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['add_to_cart'])){
        if(isset($_SESSION['cart']))
        {
            $myitems = array_column($_SESSION['cart'],'food_name');

            if(in_array($_POST['food_name'],$myitems))
            {
                echo "<script>
                alert('Item already added');
                window.location.href= 'meals.php';
                </script>";
            }
            else
            {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('food_name' => $_POST['food_name'],'food_price' => $_POST['food_price'],'quantity' => 1);
            echo "<script>
            alert('Item Added');
            window.location.href= 'meals.php';
            </script>";
            }

        }
        else
        {
             $_SESSION['cart'][0] = array('food_name' => $_POST['food_name'],'food_price' => $_POST['food_price'],'quantity' => 1);
             echo "<script>
             alert('Item Added');
             window.location.href= 'meals.php';
             </script>";
           
        }
    }
    if(isset($_POST['remove_item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['food_name'] == $_POST['food_name'])
          {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<script>
                window.location.href='mycart.php';

            </script>";
          }

        }
    }
    if(isset($_POST['Mod_Quantity']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['food_name'] == $_POST['food_name'])
          {
            $_SESSION['cart'][$key]['quantity'] = $_POST['Mod_Quantity'];
            
            echo "<script>
                window.location.href='mycart.php';

            </script>";
          }

        }
    }
}

?>