<?php
$con = mysqli_connect("remotemysql.com","LOvxtTZhXq","FMPKDVKcJd","LOvxtTZhXq");
	//$con = mysqli_connect("localhost:3307","root","","finalproj");
	$result = mysqli_query($con, "DELETE FROM prod WHERE id=" . $_GET['postid']);
	header("Location: read.php?user_id=" . $_GET['user_id']);
?>