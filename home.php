

<!DOCTYPE html>
<html>
<head>
	<title>ONLINE FORUM SYSTEM</title>
	<?php include('dbconn.php'); ?>
	<?php include('handle/session.php'); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
	

</head>
<body>
	<div id="container">
	<div class="a">
    <div class="b">
      <div class="l">
	  <h1>	WELCOME MGA PERSON!!</h1>
      </div>
	<div class="log">
		<br><i class="fa fa-user-circle-o" style="font-size:24px;color:white"></i>&nbsp;&nbsp;
		<?php 
				echo $member_row['firstname']." ".$member_row['lastname'];
			?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="handle/logout.php"><button><i class="fa fa-sign-out" style="font-size:24px;"> </i></button></a>
			
</div>

</DIV>
</div>
<div class="con">
					<form method="post"> 
					<textarea name="post_content" rows="7" cols="64" style="" placeholder="Write something.."style="height:200px" required></textarea>
					<br>
					<input type="submit"name="post" value="post">
					<br>
					</form>

</div>
<div class="con">
						<?php	
							$query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent from post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC")or die(mysqli_error());
							while($post_row=mysqli_fetch_array($query)){
							$id = $post_row['post_id'];	
							$upid = $post_row['user_id'];	
							$posted_by = $post_row['firstname']." ".$post_row['lastname'];
						?>
						

					<h3>Posted by: <?php echo $posted_by; ?></a>
					-
						<?php				
								$days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $post_row['date_created']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
						?>
					<br>
					<br><?php echo $post_row['content']; ?></h3>
					<form method="post">
					<hr>
					Comment:<br>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<textarea name="comment_content" rows="2" cols="44" style="" placeholder="COMMENT" required></textarea><br>
					<input type="submit" name="comment">
					</form>
						
					</br>
				<HR>
							<?php 
								$comment_query = mysqli_query($conn,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.user_id = comment.user_id where post_id = '$id'") or die (mysqli_error());
								while ($comment_row=mysqli_fetch_array($comment_query)){
								$comment_id = $comment_row['comment_id'];
								$comment_by = $comment_row['firstname']." ".  $comment_row['lastname'];
							?>
					<br><a ><?php echo $comment_by; ?></a> - <?php echo $comment_row['content']; ?>
					<br>
							<?php				
								$days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
								$remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
								$hours = floor($remainder / (60 * 60));
								$remainder = $remainder % (60 * 60);
								$minutes = floor($remainder / 60);
								$seconds = $remainder % 60;
								if($days > 0)
								echo date('F d, Y - H:i:sa', $comment_row['date_posted']);
								elseif($days == 0 && $hours == 0 && $minutes == 0)
								echo "A few seconds ago";		
								elseif($days == 0 && $hours == 0)
								echo $minutes.' minutes ago';
							?>
					<br><HR>
							<?php
							}
							?>
				
					&nbsp;</div>
					<div class="con">

					<?php 
					if ($u_id = $id){
					?>
					
				
					
					<?php }else{ ?>
						
					<?php
					} } ?>
					
				
							<?php
								if (isset($_POST['post'])){
								$post_content  = $_POST['post_content'];
								
								mysqli_query($conn,"insert into post (content,date_created,user_id) values ('$post_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id') ")or die(mysqli_error());
								header('location:home.php');
								}
							?>

							<?php
							
								if (isset($_POST['comment'])){
								$comment_content = $_POST['comment_content'];
								$post_id=$_POST['id'];
								
								mysqli_query($conn,"insert into comment (content,date_posted,user_id,post_id) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id','$post_id')") or die (mysqli_error());
								header('location:home.php');
								}
							?>
</div>

</body>

  <?php include('handle/footer.php');?>

  <style>
body {
  background-COLOR:#8AB6F9;
  display: grid;
  font-family:Stencil;
  letter-spacing:1px;
}
*
{
  padding:0px;
  margin:0px;
}
input[type=text], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #6699CC;
  color: white;
  padding: 5px 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #00BFFF;
}

.con{

  border-radius: 5px;
  background-color: #CADCFC;
  padding: 10px;
  margin-left:250px;
  margin-right:250px;
  margin-top:25px;
  border:3px solid black;
}
.a
{
  background-color:#00246B;
  width:100%;
  height:90px;
  border:5px solid black;
}
.b
{
  margin-left:auto;
  margin-right:auto;
  width:980px;
  height:80px;
  
}
.l
{
  float:left;
  font-family:Bubbly;
  letter-spacing:1px;
  font-weight:1px;
  font-size:18px;
  color:white;
}
.l h1
{
  margin-top:25px;
}

.log
{
  float:right;
  font-family:Forte;
  font-size:14px;
  margin-top:25px;
 color:white;
 border-bottom:2px solid black;
 padding-bottom:10px;
}



</style>

</html>