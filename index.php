<?php
session_start();
if (isset($_SESSION["userid"])){
    echo $_SESSION["userid"]."is logined"."<li><a href='logining.php'>loguot</a></li>";
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="./style.css">

</head>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post" action="includes/signup.inc.php">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pwd" placeholder="Password" required="">
					<input type="password" name="repwd" placeholder="RepeatPassword" required="">
					<button name="submit">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="includes/login.inc.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="name" placeholder="Email" required="">
					<input type="password" name="pass" placeholder="Password" required="">
					<button name="submit1">Login</button>

				</form>
			</div>
	</div>
</body>
</html>
<!-- partial -->

</html>
