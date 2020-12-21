<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="wp.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="wp.js"></script>
</head>
<body>
<?php
	$msg = "";
	if(isset($_POST['mEmail']) && isset($_POST['mPass'])){
        $con = mysqli_connect("remotemysql.com","LOvxtTZhXq","FMPKDVKcJd","LOvxtTZhXq");
        //$con = mysqli_connect("localhost:3307","root","","finalproj");
		if (!$con) {
		  die("Connection failed: " . mysqli_connect_error());
}
		$result = mysqli_query($con, "SELECT * FROM user WHERE username='".$_POST['mEmail']."' AND password='".md5($_POST['mPass'])."'");
        $row = mysqli_fetch_assoc($result);
		if($row == NULL){
			$msg = "<span style='color: blue'><br>Not registered. Create Instead!</span><br>";
		}
		else{
			header("Location: read.php?user_id=" . $row['id']);
		}
	}
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="animate__animated animate__fadeInLeft" id="ok1"><br><br>Your Data is Safe</h2>
                <h5 class="animate__animated animate__fadeInLeft" id="ok"><br>Work intelligent</h5>
                <h6 class="animate__animated animate__fadeInLeft" id="ok" style="margin-top: -23px;"><br>Be part &nbsp;<span id="anim1"></span></h6>
           </div>
            <div class="col-sm-3" id="noe">
                <h1><center>Login</center></h1>
                <?php echo $msg;?>
                <form method="post" action="index.php">
                    <label for="mEmail">Username:</label>
                    <input type="text" class="form-control f1" id="mEmail" name="mEmail"><br><br>
                    <label for="mPass">Password:</label>
                    <input type="password" class="form-control f1" id="mPass" name="mPass"><br>
                    <center><input type="submit" value="Done" class="button"></center>
                </form>
                <center><p>Don't have an account: <a href="sign_up.php">Sign-up</a></p></center>
            </div>
        </div>
    </div>
</body>
</html>
