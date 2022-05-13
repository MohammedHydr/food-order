<?php 
include('inc/connection.php');

$food = $_POST['food'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$total = $price * $qty; // total = price x qty 
$statuses = "Ordered"; 
$customer_name = $_POST['full-name'];
$customer_contact = $_POST['contact'];
$customer_address = $_POST['address'];


$sql2 = "INSERT INTO `order` (`id`, `food`, `price`, `qty`, `total`, `statuses`, `customer_name`, `customer_contact`, `customer_address`) 
    VALUES (NULL ,'$food','$price','$qty' ,'$total','$statuses','$customer_name','$customer_contact','$customer_address')";
mysqli_query($conn,$sql2) 
    Or die(mysqli_error($conn));
    header('location:order.php');

header('location:order.php')

?>