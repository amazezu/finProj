<!DOCTYPE html>
<html>
<head>
<title>Front-Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">   
</head>
<body>
<?php
 $con = mysqli_connect("remotemysql.com","LOvxtTZhXq","FMPKDVKcJd","LOvxtTZhXq");
 $createAdd="<a href='read.php?user_id=". $_GET['user_id']."' class='btn btn-danger'>Go Back Page</a>";
 if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
    $reslt="";
   // if(isset($_POST['product_name']) && isset($_POST['price'])){    
        //$con=mysqli_connect("localhost:3307","root","","finalproj";
        $result=mysqli_query($con,"INSERT INTO prod VALUES(NULL,".$_POST['user_id'].",'".$_POST['product_name']."','".$_POST['price']."',NULL)");
        header("Location: read.php?user_id=" .$_POST['user_id']);
    //}
?>
    <form method="post" action="create_product.php">
        <div class="container">
            <div class="page-header">
            <h1>Sell items</h1>
            <hr>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>  
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                     <form method="post" action="create_product.php">
                        <tr>
                            <input type="hidden" name="user_id" value=<?php echo $_GET['user_id'];?>>
                            <td><input type="text" name="product_name" class="form-control"></td>
                            <td><input type="text" name="price" class="form-control"></td> 
                        </tr>
                        <tr>
                            <?php echo $createAdd;?>
                            <input type="submit" value="Done" class="btn btn-dark">
                        </tr>
                     </form>  
                </tbody>
            </table>     
        </div>
    </form>
</body>
</html>    