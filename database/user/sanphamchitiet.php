<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "SELECT * from product where productid = $id";
$result = $conn->query($sql);
$img = mysqli_query($conn,"SELECT * FROM image where productid = $id");
$category = mysqli_query($conn, "SELECT * FROM category INNER JOIN product on category.categoryid = product.categoryid");
//var_dump($category);
$type = mysqli_query($conn, "SELECT * FROM type INNER JOIN product on type.typeid = product.typeid");

//$img_pro = mysqli_fetch_all($img);
//echo '<pre>';
//var_dump($img_pro); 
// $product = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='./sanphamchitiet.css' rel='stylesheet'>
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
        </div>
            <div class="main">           
            <div class="main_title"> <h1>Chi tiết sản phẩm</h1></div>

    <!-- start -->
    <?php 
                            while($row = mysqli_fetch_assoc($result)){
                                // echo '<pre>';
                                // var_dump($row);
                                // var_dump($result);
                                    foreach($result as $key => $value){
                                        ?>
            <div class="main_content">
         
    <!-- ẢNH ĐẦU TIÊN   
              --> <div class="main_content_img-main">       
                <img class="img_main" src="../admin/uploads/<?php echo $value['image'] ?>" alt="" >
                </div>

                <div class="main_content_box"> 
    <!-- NAME -->
                <!-- <h1 id="name">quat</h1> -->
                <h2 class="main_content_nameprd content"><?php echo  $value['name']  ?></h2>
    <!-- BRAND -->
    <div class="main_content_branch content">
                    <label for="">Brand:</label> <?php echo $value['brand']?>
                </div>
    <!-- category             -->
    <div class="main_content_category content">
                    <label for="">Category:</label> <?php while(($row['categoryid'] == 1)){ ?>
                            <?php  echo 'quạt trần';
                            // var_dump( $row['categoryid'] );
                                        break;
                                        ?>
                    <?php  } ?>      
                    <?php while(($row['categoryid'] == 2)){ ?>
                            <?php  echo 'quạt đứng';
                        
                                        break;
                                        ?>
                    <?php  } ?>
                    <?php while(($row['categoryid'] == 3)){ ?>
                            <?php  echo 'quạt âm trần';
                                        break;
                                        ?>
                    <?php  } ?>   
                    <?php while(($row['categoryid'] == 4)){ ?>
                            <?php  echo 'quạt cầm tay'; 
                                        break;
                                        ?>
                    <?php  } ?>   
                    </div>
                    
                    
        
    <!-- TYPE -->
    <div class="main_content_type content">
                    <label for="">Type:</label>
                <?php
                while($cate =  mysqli_fetch_all($category)){
                foreach($category as $key => $categoryy){ ?>
                    <?php while(($row['typeid'] == 5)){ ?>
                            <?php  echo 'hiện đại';
                                        break;
                                        ?>
                    <?php  } ?>      
                    <?php while(($row['typeid'] == 6)){ ?>
                            <?php  echo 'cổ điển';
                                        break;
                                        ?>
                    <?php  } ?>
                    <?php while(($row['typeid'] == 7)){ ?>
                            <?php  echo 'tương lai';
                                        break;
                                        ?>
                    <?php  } ?>   
                    <?php while(($row['typeid'] == 8)){ ?>
                            <?php  echo 'tối giản'; 
                                        break;
                                        ?>
                    <?php  } ?>   
                    </div>
                    
                    <?php break; } ?>
    
                <?php break; } ?>
    <!-- GIA -->
    <div class="main_content_price content"><label for="">Price:</label> <?php echo $value['price'] ?></div>
    <!-- ADD TO CART -->
    <div class="main_content_addcart content"><button>Add to cart</button></div>
    <!-- ẢNH MÔ TẢ-->
    <div class="main_content_imgdes content">
                            <?php while($anh = mysqli_fetch_all($img)){
                                    foreach($img as $key => $hi){
                                        ?>
                                    
                                    <div class="img_des">  <img class='lst_img-des1' src="../admin/uploadsmota/<?php echo $hi['image'] ?>" alt=""  >      </div>                                                                                   
                            <?php } ?>
                            <?php } ?>
                </div>
        
   </div>
 
                <?php } ?>
                <?php  } ?>
              
    </div>     <!-- MÔ TẢ -->
    <div class="main_description">
            <?php echo $value['ProductDescription'] ?>
                </div></div>
    <!-- js -->
    <script src="./sanphamchitiet.js"></script>
    <!-- <script>

    </script> -->
</body>
</html>