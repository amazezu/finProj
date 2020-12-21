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
    $content = "";
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $dontChange = $_GET['userr_id'];
    $goBack = "<a href='read.php?user_id=".$dontChange."' class='btn btn-danger'>Back</a>";
    $result=mysqli_query($con,"SELECT * FROM phone_num");
    while($row=mysqli_fetch_assoc($result)){
        if($_GET['postid']==$row['user_id']){
            $content.="<h5><br>".$row['phone']."</h5>";
        }
    }
   // $result=mysqli_query($con,"SELECT * FROM user WHERE);
    
?>
	<div class="container">
        <div class="page-header">
			<h1>Interested Buyer Contacts</h1>
            <hr>
		</div>
		<div>
            <?php echo $content ?><br>
			<?php echo $goBack ?>
		</div>
	</div>
</body>
</html>



