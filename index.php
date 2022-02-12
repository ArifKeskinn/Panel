<!DOCTYPE html>
<html>
    <head lang="en">
	<link rel="shortcut icon" href="icon.ico">
<link rel="stylesheet" type="text/css" href="banner-styles.css" />
<link rel="stylesheet" type="text/css" href="iconochive.css" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

                    <link id="themeCss" rel="stylesheet" type="text/css" href="bootstrap.css"/>
            <link id="themeOverrideCss" rel="stylesheet" type="text/css" href="main.css"/>
                <link rel="stylesheet" type="text/css" href="style.css"/>


	</head>
	<body style="background-image: url('images/bg.jpg');">
<form action="index.php" method="POST">
	<div class="loginFormWrapper" >
    	
		<div class="loginForm">

			<div class="left">
		
				<input type="text" name="username" placeholder="username"><br/>
				<input type="password" name="password" placeholder="Password">
				<img src="captcha.php" id="capt">
				<input type="text" name="deger" placeholder="Captcha"/>
				<?php
				require('sql.php');
					session_start();
					// If form submitted, insert values into the database.
					if (isset($_POST['username']) && isset($_POST['deger'])){

						if ($_POST['deger'] == $_SESSION['captcha']){
							
							// removes backslashes
						$username = stripslashes($_REQUEST['username']);
							//escapes special characters in a string
						$username = mysqli_real_escape_string($con,$username);
						$password = stripslashes($_REQUEST['password']);
						$password = mysqli_real_escape_string($con,$password);
						//Checking is user existing in the database or not
							$query = "SELECT * FROM `users` WHERE username='$username'
					and password='".md5($password)."'";
						$result = mysqli_query($con,$query) or die(mysql_error());
						$rows = mysqli_num_rows($result);
							if($rows==1){
							$_SESSION['username'] = $username;
								// Redirect user to index.php
							//header("Location: management.php");
							echo '<br><span style="color:green">BAŞARILI</span>';
							header("Refresh: 2; url=management.php");
							
							}else{
								
								echo "<div class='form'>
							<h3>Username/password is incorrect.</h3>
							</div>";

							header("Refresh: 3; url=index.php");
							exit();
							}
						 }else{
							echo '<br><span style="color:red"> CAPTCHA BAŞARISIZ!!!</span>';
						 }
						}
				?>
				
			</div>

			<div class="right">
				<input type="submit" value="Login">
			</div>

			<div class="clear"></div>
			<center>
	<div id="footer" class="text-center">
		Control Panel
		&copy;
	</div></center>

		</div>


		
	</div>
</form>


<script type="text/javascript">
    function reload() {
        img = document.getElementById("capt");
        img.src = "captcha.php"
    }
</script>
</body>
</html>