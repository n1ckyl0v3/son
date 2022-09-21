<?php
session_start();
include 'connect.php';

$object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
var_dump($object);
 $userid = $object;
if(isset($_GET['id'])){
    $id = $_GET['id'];
 }
$action = (isset($_GET['action']))? ($_GET['action']) : 'add';
$quantity = (isset($_GET['quantity']))? ($_GET['quantity']) : 1;
if($quantity <= 0){
    $quantity = 1;
}
// var_dump($action);
// die();

 $product = mysqli_query($conn,"SELECT * from product where productid = $id"); 

 $item = mysqli_fetch_assoc($product);
 //var_dump($item);
 $item =[
    'id' => $item['productid'],
    'name' => $item['name'],
    'image' => $item['image'],
    'price' => $item['price'],
    'quantity' => $quantity
 ]; 

 if($action == 'add'){
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity'] += $quantity;
     }else{
        $_SESSION['cart'][$id] = $item;
     }
 }
if($action == 'update'){
    $_SESSION['cart'][$id]['quantity'] = $quantity  ;
}
if($action == 'delete'){
    unset($_SESSION['cart'][$id]);
}
echo "<br>";
var_dump($_GET);
$sql = "SELECT * FROM user where userid= $userid";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        echo "<pre>";
        var_dump($row);
  
header("location:view-cart.php?userid=$row[userid]");
 //echo "<pre>";
 //var_dump($_SESSION['cart']);
 
 
 //var_dump($cart);
 //thêm mơi giỏ hàng
 //cập nhật giỏ hàng
 //xóa sản phẩm
 ?>
