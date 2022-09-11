<?php
include 'connect.php';
 $product = mysqli_query($conn,"SELECT * FROM product");
?>
<style>

   
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='./danhsachsanphamuser.css' rel='stylesheet'>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link href="./sourcecss.css" rel="stylesheet">
</head>
<body>
<div id="container1">
        <div id ="header">
            <div id="header1">
                <nav class="nav">
                    <a href="" id="logo">
                        <img src="../../public/logo.png" alt="">
                    </a>
                    <ul id="main-menu">
                        <li><a class="linkheader" href="#">Products</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul>
                        </li> 
                        <li><a class="linkheader" href="#">Help Center</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul></li>
                        <li><a class="linkheader" href="#">Explore</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul></li>
                    </ul>
                </nav>
            </div>
            <div class="img">
                <img src="../../public/bia.png" alt=""> 
                <div class="text"><a style="    position: absolute;" href="../../html/index.html">Home</a></div>
            </div>
        </div>
    </div>
        <div class="container">
        <div class="row mt-5">
            <form action="" method="post">
            <h1>Danh sách sản phẩm</h1>
            <div class="product-group">
            <div class="row">
       
                <?php 
                            while($row = mysqli_fetch_assoc($product)){
                                    foreach($product as $key => $value){
                                        ?>
                                             <div class="col-md-3 col-sm-6 col-12">
                                        <div class="card card-product mb-3">
                       <div class="card-img"><img class="card-img-top" src="../admin/uploads/<?php echo $value['image'] ?>" alt="" width="100" class="img"></div> 
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $value['name'] ?></h5>
                    <!-- <p class="card-text"><?php echo $value['ProductDescription'] ?></p> -->
                    <a class="buy" href="sanphamchitiet.php?id=<?php echo $value['productid'] ?>">Buy</a>
                    </div>    </div>    </div>
                <?php } ?>
                <?php } ?>  
        
                             
                </div>
            </div>
            </form>
        </div>
        </div>  
    <script src="../js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>