<?php
include 'connect.php';
session_start();
$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];
// $row = mysqli_fetch_all($cart);
$total = 0; 
foreach($cart as $key => $value){
    $total += $value['price'] * $value['quantity'];
}
 //var_dump($cart['id']);
 $object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
 $userid = $object;
$error = [];
if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $ghichu = htmlspecialchars($_POST['ghichu']);
    var_dump($ghichu);

    if(empty($name)){
        $error['name'] = "Bạn chưa nhập tên";
    }
    if(empty($phone)){
        $error['phone'] = "Bạn chưa nhập số điện thoại";
    }
    if(strlen($phone) < 10 || strlen($phone) >10){
        $error['phonee'] = "Sai định dạng điện thoại";
    }
    if(empty($address)){
        $error['address'] = "Bạn chưa nhập địa chỉ";
    }
    
    if(count($error) == 0){
     
    $customer = "INSERT INTO `customer` (`customerid`, `name`, `biling_address`, `phone`,`userid`) VALUES (NULL,'$name','$address', $phone,$userid)";
    $result = $conn->query($customer);
    $customer_id = $conn->insert_id;
    var_dump($customer_id);

    $order ="INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `status`, `ghichu`,`userid`) VALUES (NULL, $customer_id, $total, '1','$ghichu',$userid)";
    $result = $conn->query($order);
    $order_id = $conn->insert_id;
   
    
    foreach($cart as $key => $value){
       $sql = "INSERT INTO `orderdetail` (`orderdetailid`,`userid`, `orderid`, `productid`, `price`, `quantity`,`customerid`) VALUES (NULL,$userid, $order_id,".$value['id'].", ".$value['price'].", ".$value['quantity'].",$customer_id)";
       $result = $conn -> query($sql);
       if($result){
        unset($_SESSION['cart']);
        header("location: success.php?userid=$userid");
       }else{
        echo "Error: " . $conn->error;
       }
    }

}
 
}
?>
<?php include 'header.html'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
    .form{
        /* margin-top: 20px; */
        width: 80%;
        margin: 20px auto;
    }
    .submit{
        background-color: #53284f;
        color: whitesmoke;
        border-radius: 3px;
        width: 6rem;
    }
</style>

    <div class="form">
    <form action="" method="post">
 
    <div class="form-group">
            <label  for="">Tên:</label>
            <input class="form-control" type="text" name="name">
        </div>
       
        <div class="form-group">
            <label for="">Số điện thoại:</label><br>
            <input class="form-control" type="text" name="phone">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ:</label>
            <input class="form-control" type="text" name="address">
        </div>
        <div class="form-group">
            <label for="">Ghi chú:</label>
            <textarea class="form-control"  name="ghichu" id="" cols="30" rows="10"></textarea>
        </div>
        <input class="submit" type="submit" value="Đặt hàng" name="submit">
        <?php 
         foreach($error as $key => $value){
              echo $value;
         }
        ?>
    </form>
    </div>

</html>