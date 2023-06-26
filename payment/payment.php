<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        .container{
            width: 500px;
            margin: 0 auto;
            text-align: center;
        }
        .payment-header{
            margin : 40px auto;
        }
        .form-container{
            background-color: #f2f2f2;
            padding: 30px;
            border-radius: 10px;
        }
        label{
            font-weight: bold;
            margin-right: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],

        select{
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"]{
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="payment-header">Payment Information</h1>
        <div class="form-container">
            <form action = "#" method = "POST">
                <label for="s_id">Student Id:</label>
                <input type="number" id="s_id" name="s_id" placeholder="Enter your student ID" required>
                <label for="s_email">Email:</label>
                <input type="email" id="s_email" name="s_email" placeholder="Enter your email" required>
                <label for="p_amount">Amount:</label>
                <input type="number" id="p_amount" name="p_amount" placeholder="Total amount" required>

                <label for="payment_method">Payment Method:</label>
                <select name="payment_method" id="payment_method">
                    <option value="Cash On Delivery">Cash On Delivery</option>
                </select>
                <label for="location">Select Delivery Location</label>
                <select name="location" id="location">
                    <option value="zero point">Zero Point</option>
                    <option value="it faculty">IT Faculty</option>
                    <option value="science faculty">Science Faculty</option>
                    <option value="law faculty">Law Faculty</option>
                </select>
                <input type="submit" name="submit" value="SubmitPayment">
            </form>
        </div>

    </div>
    
</body>
</html> 
<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: http://localhost/Food-Ordering/FOOD-ORDER/index.php");
    exit;
    }
    include('./config.php');
    ?>

     <?php
     $session_email = $_SESSION['s_email'];
     $select_customer = "select * from student where s_email = '$session_email'";


    if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(isset($_POST['submit'])){
    
    $order_id = mysqli_insert_id($conn);
    $p_amount = $_POST['p_amount'];
    $p_type = $_POST['payment_method'];
    $location = $_POST['location'];
    $query2 = "INSERT INTO `payment`(`p_amount`, `p_type`, `location`) VALUES ('$p_amount','$p_type','$location')";
    $stmt = mysqli_prepare($conn,$query2);
    if($stmt)
    {
            foreach($_SESSION['cart'] as $key => $values)
            {
                $p_amount = $values['p_amount'];
                $p_type = $values['p_type'];
                $location = $values['location'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION['cart']);
            echo "
        <script>
            alert('Payment Successful');
        </script>
        ";
    }
    else{
        echo "
        <script>
            alert('SQL Error');
            window.location.href = 'mycart.php';
        </script>
        ";
    }
}
}


 ?>