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
	$con = mysqli_connect("localhost:3307","root","","finalproj");
	$goBack = "<a href='read.php?user_id=".$_GET['user_id']."' class='btn btn-danger'>Back</a>";
	if(isset($_POST['user_id'])){
		$result = mysqli_query($con, "UPDATE prod SET product_name='". $_POST['post'] ."',price='". $_POST['post2'] ."'  WHERE id=" . $_POST['postid']);
		header("Location: read.php?user_id=".$_POST['user_id']);
	}
	else{
		$result = mysqli_query($con, "SELECT * FROM prod WHERE id=".$_GET['postid']);
		$row = mysqli_fetch_assoc($result);
	}
?>
	<div class="container">
        <div class="page-header">
			<h1>Edit Product Details</h1>
			<hr>
		</div>
		<div>
			<form action='edit_product.php' method='post'>
				<input type='text' name='post' value='<?php echo $row['product_name']?>'>
				<input type='text' name='post2' value='<?php echo $row['price']?>'>
				<input type='hidden' name='user_id' value='<?php echo $_GET['user_id']?>'>
				<input type='hidden' name='postid' value='<?php echo $_GET['postid']?>'>
				<input type='submit' value='Edit' class='btn btn-dark'>
				<?php echo $goBack ?>
			</form>
		</div>
	</div>
</body>
</html>



