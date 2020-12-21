<!DOCTYPE html>
<html>
<head>
<title>Front-Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="read.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">   
</head>
<body>
<?php
 $con = mysqli_connect("localhost:3307","root","","finalproj");
 if (!$con) {
   die("Connection failed: " . mysqli_connect_error());
}
    $result=mysqli_query($con,"SELECT * FROM prod");
    $content="";
    $content2="#";
    $cont=1;
    $random="";
    $random4="";
    $random3="";
    $createAdd="<a href='create_product.php?user_id=". $_GET['user_id']."' class='btn btn-primary'>Add Product</a>";
   
    while($row=mysqli_fetch_assoc($result)){   
        if($_GET['user_id']==$row['user_id']){
            $createDel="<a href='delete_product.php?user_id=". $_GET['user_id']."&postid=". $row['id']."' class='btn btn-warning'>Delete</a>";
             $createEdit="<a href='edit_product.php?user_id=". $_GET['user_id']."&postid=". $row['id'] ."' class='btn btn-info'>Edit</a>";
            $random = $createDel;
            $random3 = $createEdit;
            $ret_phone = "<a href='retrieve_phone.php?userr_id=". $_GET['user_id']."&postid=". $row['id']."' class='btn btn-success'>Buyers</a>";
            $content.="<tr><div class='toChange'><td><center>". $content2. $cont++."</center></td>"."<td><center>". $row['product_name']."</center></td>"."<td><center>". $row['price']."</center></td>"."<td><span style='font-size:13px;font-family:Arial;!important'><center>". $row['date_at']."</center></span></td>"."<td><center>".$random."&nbsp".$random3."&nbsp".$ret_phone."</center></td>"."</div></tr>";
        }
        else{
            $createBuy="<a href='buy.php?user_id=". $_GET['user_id']."&postid=". $row['id']."' class='btn btn-secondary'>Buy</a>";
            $random4 = $createBuy;
            $content.="<tr><div class='toChange'><td><center>". $content2.$cont++."</center></td>"."<td><center>". $row['product_name']."</center></td>"."<td><center>". $row['price']."</center></td>"."<td><span style='font-size:13px;font-family:Arial;!important'><center>". $row['date_at']."</center></span></td>"."<td><center>".$random4."</center></td>"."</div></tr>";
        }
       // $content.="<tr><div class='toChange'><td><center>". $content2."</center></td>"."<td><center>". $row['product_name']."</center></td>"."<td><center>". $row['price']."</center></td>"."<td><span style='font-size:13px;font-family:Arial;!important'><center>". $row['date_at']."</center></span></td>"."<td><center>".$random."&nbsp".$random3."</center></td>"."</div></tr>";
    }
?>
    <div class="container">
        <div class="page-header">
            <h1>Products</h1>
            <hr>
        </div>
        <div><!--location.href='create_product.php'
            <form action='create_product.php' method='post'>
                <input type='hidden' name='user_id' value='<//?php echo $_GET['user_id']?>'>
                <input type='submit' value='Add Product' class='btn btn-primary'>
            </form>-->
            <!--<button onclick="location.href='create_product.php'" class="btn btn-primary">Add product</button>-->
            <?php echo $createAdd; ?>
        </div>
        <br>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th><center>No.</center></th>
                        <th><center>Product Name</center></th>
                        <th><center>Price</center></th>
                        <th><center>Date Posted</center></th>
                        <th><center>Action</center></th>
                        
                    </tr>
                    <tr>
                        <?php echo $content; ?>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
        <br><button type='button' onclick='location.href="index.php"' class="btn btn-link" style='margin-left:50px'>LOG OUT</button>
</body>
</html> 