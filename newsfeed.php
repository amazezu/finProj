<?php
	$con = mysqli_connect("localhost:3307","root","","mysocmed");
	$result = mysqli_query($con, "SELECT * FROM post");
	$content = "";
	while($row = mysqli_fetch_assoc($result)){
		$reply = "";
		$result2 = mysqli_query($con, "SELECT * FROM reply WHERE postid=" . $row['id']);
		while($row2 = mysqli_fetch_assoc($result2)){
			$reply .= "<div class='reply'>".  $row2['message'] ."<span>". $row2['created_at'] ."</span></div>";
		}
		$d = "";
		$del = "";
		$ed = "";
		if($_GET['userid'] == $row['userid']){
			$d = "postmine";
			$ed = "<a href='editPost.php?userid=". $_GET['userid'] ."&postid=". $row['id'] ."' style=';border: solid 1px #0f0; padding: 1px; float: right; font-size: 8px; color: red; bottom: 0px;'>E</a>";
			$del = "<a href='deletePost.php?userid=". $_GET['userid'] ."&postid=". $row['id'] ."' style='border: solid 1px #f00; padding: 1px; float: right; font-size: 8px; color: red; bottom: 0px;'>X</a>";
		}
		$content .= "<div class='post $d'>" .  $row['post'] . "{$del}{$ed}<span>". $row['created_at'] ."</span></div>$reply<div style='text-align: right'><form action='reply.php' method='post'><input type='text' name='reply'><input type='hidden' name='postid' value='".$row['id']."'><input type='hidden' name='userid' value='".$_GET['userid']."'><input type='submit' value='Reply'></form></div>";
	}
?>
<style>
	.post{margin: 2px; padding: 5px; border: solid 1px #222; background-color: #ccc;}
	.post span, .reply span{font-size: 8px; float: right;}
	.postmine{background-color: #eee;}
	.reply{width: 80%; margin: 2px; margin-left: 15%; padding: 5px; border: solid 1px #555;}
</style>
<a href='index.php'>Logout</a>
<div style='width: 500px; padding: 20px; border: solid 1px #333; margin: 0 auto'>
	<form method='post' action='postData.php'>
	<input type='hidden' name='userid' value='<?php echo $_GET['userid']?>'>
	<input type='text' name='message' style='width:100%'><input type='submit' value='post'>
	</form>
	<?php echo $content?>
</div>