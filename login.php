<?php require_once("includes/connect.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>
<?php 
	if(isset($_SESSION["UserId"])){
    header("Location: dashboard.php");
	exit;
    }
  
	if(isset($_POST['submit'])){
		$uname = $_POST['uname'];
		$password = $_POST['password'];
		if(empty($uname) || empty($password)){
			$_SESSION["ErrorMessage"]="All the fields must be filled."; 
			header("Location: login.php");
			exit;
		}
		else{
			global $con;
			$acc = login_attempt($uname, $password);
			if($acc){
				$_SESSION["UserId"]=$acc['uid'] ;
				$_SESSION["UserName"]=$acc['username'] ;
				//echo "Welcome ".$uname;
				header("Location: dashboard.php");
				exit;
			}
			else{
				$_SESSION['ErrorMessage'] = "Wrong username/password.";
				header ("Location: login.php");
				exit;
			}
		}		
	}    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	<header>
		<nav>
			<a href="index.php">Back To Main Page</a>
		</nav>
	</header>
	<main>
	<?php
		echo success_message();
		echo error_message();
	?>
    <h1>Login</h1>
    <form class="" action="login.php" method="post">
      <label for="">Username:</label>
      <input type="text" name="uname" value="">
      <br><br>
      <label for="">Password:</label>
      <input type="password" name="password" value="">
      <br><br>
      <button type="submit" name="submit">Login</button>
      <br>
      <p>Not a member? <a href="register.php">Register</a>
      </p>
    </form>
	</main>
  </body>
</html>