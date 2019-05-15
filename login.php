 <?php
  if(isset($_POST['Login_submit']))
  {
	$link = mysqli_connect("localhost", "root", "", "classroom_db");
		if (!$link)
		echo('Not connected');
	$VarUserID=$_POST['UID'];
	$VarPassword =$_POST['Pass'];
	$check = 0; 

	$q="SELECT admin_id, admin_name FROM admin WHERE admin_name='$VarUserID' and admin_password='$VarPassword'";
	$result=  mysqli_query($link, $q);
	$num_results = mysqli_num_rows($result);

		if($num_results==1)
		{		
			session_start();
			$row = mysqli_fetch_array($result);
			$check = 1; 
			$_SESSION['admin_id'] = $row[0];
			$_SESSION['admin_name'] = $row[1];
			
			header("location: advanced_table_admin.php");
		}else { echo "Error: " . $q . "<br>" . $link->error;
		}
  }


?>
<html>
<head>
<style>
@import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: auto;
	height: auto;
	background-image: url(img/login-bg.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;

	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(45% - 255px);
	z-index: 2;
}
 
.header div{
	float: left;
    padding-left: -90px;
    padding-top: 10;
	color: #004F00;
	font-family: 'Exo', sans-serif;
	font-size: 45px;
	font-weight:600;
}

.header div span{
	color: #009900 !important;
}

.login{
	position: absolute;
	top: calc(57% - 85px);
	left: calc(58% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}
.login img{
	padding-left: 15%;
}
.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 250px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>
</head>
<body>
<div class="body"></div>
		<div class="grad"></div>

		<div class="header">

			<div>LUCTRE<span>SYSTEM</span></div>
		</div>
		<br>
		<div class="login">
		<form  method="post">
				<input type="text" name="UID" id="UID" placeholder="username" name="user"><br>
				<input type="password" name="Pass" id="Pass" placeholder="password" name="password"><br>
				<input  type="submit" name="Login_submit" id="Login_submit" value="Login">
				</form>
		</div>


	</body>
		</html>