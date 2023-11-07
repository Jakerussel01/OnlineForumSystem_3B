<!DOCTYPE html>
<html>
<head>
<title>ONLINE FORUM SYSTEM</title>
	<link href="asset/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
	<script src="asset/js/jquery-1.9.1.min.js"></script>
	<?php include('dbconn.php'); ?>
</head>

<body>

<div class="a">
    <div class="b">
      <div class="logo">
	  <h1>ONLINE FORUM SYSTEM</h1>
      </div>
	  <div class="login">
	   <form id="login_form"  method="post">
	   <label class="inp">USERNAME</label>        &nbsp; &nbsp; &nbsp;                                                                                                                                               &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	   <label class="inp">PASSWORD </label><BR>
        <input type="text" class="inputA" id="username" name="username" placeholder="Username" required> &nbsp;
        <input type="password" class="inputA"  id="password" name="password" placeholder="Password" required>
        <button name="login" class="button" type="submit">Sign in</button>
		      </form>
		</div>
    </div>
  </div>			<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "handle/login.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Welcome Back!", { header: 'Access Granted' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'home.php'  }, delay);  
						}
						else
						{
						$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
						}
						
					});
					return false;
				});
			});
			</script>  

  
  
		</div>
		</div><!--form-->
		
		
<div class="content">
	
    <div class="left">
	<h1 style=" font-family:Bubbly;">ABOUT THIS WEBSITE</h1><br><BR>
	<h3>&nbsp; &nbsp;In the digital age, online forum systems have redefined
    online interaction. They connect people worldwide, allowing 
    them to share information, collaborate, and build 
    communities.</h3><BR>
	<B><h3>Objectives of Online Forum Systems:</h3></B><BR>
<ul style="list-style-type: square; font-family:Arial;">
  <li>Information Exchange</li>
  <li>Community Building</li>
  <li>Support and Assistance</li>
  <li>Discussion and Debate</li>
  <li>Collaboration</li>
  <li>Knowledge Repository</li>
</ul>
<BR><BR>
	<B><h3>Benefits of Online Forum Systems: </h3></B><BR>
  <ul style="list-style-type: square; font-family:Arial;">
  <li >Access to Expertise</li>
  <li>Community Support</li>
  <li>Diverse Perspectives</li>
  <li>Global Reach</li>
  <li>Structured Information</li>
  <li>User Engagement</li>
</ul>
	
    </div>

    <BR> 
    <div class="right"> 
			<form  style=" border:5px solid black; padding:20px;    border-radius: 25px;"method="POST" action="handle/signup.php" id="signup">
      <h1 style=" font-family:Bubbly;">Register here</h1><br><hr>
			<label>FIRSTNAME</label>                                                                                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<label>LASTNAME</label><BR>
				<input type="text" class="inputA" name="firstname"  required>
				<input type="text" class="inputA" name="lastname"  required><BR><BR>
				<HR><BR>
			<label>USERNAME</label><BR>                                                                                                                   
				<input type="text" class="inputA" name="username" required><BR><BR>
			<label>PASSWORD </label>                                                                                                                              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<label>CONFIRM PASSWORD</label><BR>
				<input type="password" class="inputA" name="password"  required>
               <input type="password" class="inputA" name="confirm_password"  required><BR><BR>
			
			
				<input type="submit" class="button" name="save" value="Save">
			</form>
			</div>

    </div>
    <div class="x">
      <CENTER><h3>CREATOR  </h3></CENTER><hr>
	<BR><BR> 
  <div class="column">
    <div class="card">
      <img src="image/a.jpg"  style="width:100%">
      <div class="container">
      <h2>Jake Russel Belen </h2>
        <p>BSCS 3B</p>
        <p>belenjakerussel97@gmail.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="image/b.jpg"  style="width:100%">
      <div class="container">
        <h2>Raine Esparrago</h2>
        <p>BSCS 3B</p>
        <p>@esparragoraine2@gmail.com</p>
    </div>      
  </div>
<div>
			
<br>
</center>
<?php include('handle/scripts.php');?>

</body>
</html>

<style>
 

body {
  background-COLOR:#8AB6F9;
  display: grid;
}
*
{
  padding:0px;
  margin:0px;
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
.logo
{
  float:left;
  font-family:Bubbly;
  letter-spacing:1px;
  font-weight:1px;
  font-size:18px;
  color:white;
}
.logo h1
{
  margin-top:25px;
}
.login
{
  float:right;
  font-family:Forte;
  font-size:13px;
  margin-top:25px;
 
}
.x{
  border:5px solid black; 
  padding:20px;
   border-radius: 25px;
}
.inp{
	color:white;
}
.login p
{
  margin-left:10px;
  color:white;
}
.inputA[type=text] {
  padding: 5px 10px;
  margin: 2px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}
.inputA[type=PASSWORD] {
  padding: 5px 10px;
  margin: 2px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}


.content
{
  width:980px;
  margin-left:auto;
  margin-right:auto;
  height:500px;
  padding:10px;
}
.left
{
  border-right:5px solid black;
  font-family:Arial;
  color:black;
  font-size:14px;
  float:left;
  width:480px
}
.right
{
  border-radius: 25px;
  font-family:Forte;
  padding-top:5px;
  padding-LEFT:500px;
}




.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  margin-left: 150px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}


.container {
  padding: 11px 16px;
  background-color:#6082B6;
  
}


.button {
  background-color: #CADCFC;
  border-radius: 5px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  font-family:Forte;
}
</style>



    