<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
<?php
$con = mysqli_connect("remotemysql.com","LOvxtTZhXq","FMPKDVKcJd","LOvxtTZhXq");
	//$con = mysqli_connect("localhost:3307","root","","finalproj");
    $goBack = "<a href='read.php?user_id=".$_GET['user_id']."' class='btn btn-danger'>Back</a>";
    if(isset($_POST['phone'])){
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result=mysqli_query($con,"INSERT INTO phone_num VALUES(NULL,".$_POST['post_id'].",'".$_POST['phone']."')");      
        header("Location: read.php?user_id=" .$_POST['my_id']);
    }
    
?>
	<div class="container">
        <div class="page-header">
			<h1>Buy Product</h1>
            <hr>
            <h3>Input contact details. The seller will contact you in a moment...</h3>
			<hr>
		</div>
		<div>
			<form action='buy.php' method='post'>
                <input type="hidden" name="my_id" value=<?php echo $_GET['user_id']?>
                <input type="hidden" name="post_id" value=<?php echo $_GET['postid'];?>>
				<input type='text' name='phone' placeholder='+63 or 09' class='form-control' style='width:150px'><br>
				<input type='submit' value='OK' class='btn btn-dark'>
				<?php echo $goBack ?>
			</form>
		</div>
	</div>
</body>
</html>



