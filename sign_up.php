<!DOCTYPE html>
<html>
<head>
    <title>Sign-Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="wp.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<?php
    $msg = "";
    if(isset($_POST['reg']) && isset($_POST['mEmail']) && isset($_POST['mPass'])){
        $con = mysqli_connect("remotemysql.com","LOvxtTZhXq","FMPKDVKcJd","LOvxtTZhXq");
        //$con = mysqli_connect("localhost:3307","root","","finalproj");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql_u = "SELECT * FROM user WHERE username='".$_POST['mEmail']."'";    
        $res_u = mysqli_query($con,$sql_u);

        if(mysqli_num_rows($res_u)>0){
            $msg = "Username Already Taken";
        }
        else{
            $query = "INSERT INTO user (id,username,password)
                    VALUES (NULL,'".$_POST['mEmail']."','".md5($_POST['mPass'])."')";
            $res_u = mysqli_query($con, $query);
            $msg = "Successful!";
        }
    }
?> 
    <div class="container">
        <div class="row">
            <div class="col-sm-9">             
                <h2 class="animate__animated animate__fadeInLeft" id="ok1"><br><br>Your Data is Safe</h2>
                <h5 class="animate__animated animate__fadeInLeft" id="ok"><br>Work intelligent</h5>
           </div>
            <div class="col-sm-3" id="noe">
                <h1><center>Sign-Up</center></h1>
                <?php echo $msg;?>
                <form method="post" action="#">
                    <label for="mEmail">Username:</label>
                    <input type="text" class="form-control f1" id="mEmail" name="mEmail" required><br><br>
                    <label for="mPass">Password:</label>
                    <input type="password" class="form-control f1" id="mPass" name="mPass" required><br>
                    <center><input type="submit" name="reg" value="Register" class="button"></center>
                </form>
                <center><p>Already have an account: <a href="index.php">Login</a></p></center>
            </div>
        </div>
    </div>
</body>
</html>
