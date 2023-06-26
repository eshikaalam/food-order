<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/ind.php");
    exit;
    }
    include('./config.php');
?>
<?php
    $session_email = $_SESSION['s_email'];
    $select_customer = "select * from student where s_email = '$session_email'";

    $run_cust = mysqli_query($conn,$select_customer);
    $row_customer = mysqli_fetch_array($run_cust);
    $s_id = $row_customer['s_id'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/b94379aac3.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex justify-content-center mb-5">
   <a href="http://localhost/Food-Ordering/food-order/home.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; height: 60px; width: 100px;">Home</button></a>
   <a href="http://localhost/Food-Ordering/food-order/index.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; margin-left: 60px; height: 60px; width: 100px;">Index</button></a>
   <a href="http://localhost/Food-Ordering/food-order/meals.php"><button type="submit" class="btn btn-outline-success" style="margin-top: 35px; margin-left: 60px; height: 60px; width: 100px;">Menu</button></a>
   </div>
   <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center border-0 rounded bg-dark text-white mb-5">
            <h1>MY CART</h1>
        </div>
        <div class="col-lg-8 mx-auto">
            <table class="table table-borderless">
                    <thead class="text-center text-xl text-dark bg-light">
                        <tr class="mb-5">
                            <th scope="col">Serial No.</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Taka</th>
                            <th scope="col"></th>          
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        if(isset($_SESSION['cart']))
                        {
                            foreach($_SESSION['cart'] as $key => $value)
                            {
                                $sr = $key + 1;
                               
                                echo "
                                <tr class='mg-5'>
                                    <td>$sr</td>
                                    <td>$value[food_name]</td>
                                    <td>$value[food_price]<input type='hidden' class='iprice' value='$value[food_price]'></td>
                                    <td>
                                    <form action='manage_cart.php' method='POST'>
                                    <input class='text-center border-0 bg-light rounded-3 text-dark  text-xl iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[quantity]' min='1' max='60'>
                                    <input type='hidden' name='food_name' value='$value[food_name]'>
                                    </form>
                                    </td>

                                    <td class = 'itotal'></td>
                                   
                                   <td><form action='manage_cart.php' method='POST'>
                                   <button class='border-0' name='remove_item'><i class='fa-solid fa-trash fa-xl text-success'></i></button>
                                   <input type='hidden' name='food_name' value='$value[food_name]'>
                                   </form>
                                   </td>
                                   
                                </tr>

                                ";
                            }
                        }
                        ?>
                    </tbody>
            </table>
        </div>

        <div class="call-lg-4 mt-5 bg-light d-flex flex-row justify-content-center">
            <h3 class="text-center text-dark p-3">Total: </h3>
            <h3 class="text-center text-dark p-3"> <span id="gtotal"></span> Tk</h3>
            
        </div>

        <?php
            if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
            {
        ?>
        <form action="payment/payment.php" method="POST" class="mt-5 d-flex justify-content-center">
        <button class="btn btn-outline-success" style="height: 60px; width: 100px;" name="purchase">Make a purchase
            </button>
        </form>
        <?php
            }
            ?>
    </div>
   </div>
<script>
 
 var gt = 0;
 var iprice = document.getElementsByClassName('iprice');
 var iquantity = document.getElementsByClassName('iquantity');
 var gtotal = document.getElementById('gtotal');
 var itotal = document.getElementsByClassName('itotal');

 function subTotal()
 {
    gt = 0;
    for(i=0;i<iprice.length;i++)
    {
        itotal[i].innerText = (iprice[i].value * iquantity[i].value);
        gt = gt + (iprice[i].value) * (iquantity[i].value);
    }
    gtotal.innerText = gt;
    
 }

 subTotal();

 

</script>
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>