<?php require_once("includes/connect.php") ?>
<?php require_once("includes/sessions.php") ?>
<?php require_once("includes/functions.php") ?>
<?php 
	if(isset($_POST['submit'])){
		$uname = $_POST['uname'];
		$mail = $_POST['mail'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		if(empty($uname) || empty($mail) || empty($password1) || empty($password2)){
			$_SESSION['ErrorMessage'] = "Fill all the fields.";
			header("Location: register.php");
			exit;
		}
		else if(strlen($password1)<6){
			$_SESSION['ErrorMessage'] = "Password length should be more than 6.";
			header("Location: register.php");
			exit;
		}
		else if($password1 != $password2){
			$_SESSION["ErrorMessage"] = "Passwords do not match.";
			header("Location: register.php");
			exit;
		}
		else {
			$sql = "INSERT INTO users(username, mail, password) VALUES(:uname, :mail, :pass) ";
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':uname',$uname);
			$stmt->bindValue(':mail',$mail);
			$stmt->bindValue(':pass',$password1);
			$exec = $stmt->execute();
			
			if ($exec){
				$_SESSION['SuccessMessage'] = "User added successfully";
				header("Location: login.php");
				exit;
			}
			else{
				$_SESSION['ErrorMessage'] = "Something went wrong";
				header("Location: register.php");
				exit;
			}
			
		}
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User registration</title>
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
    <h1>Register Here</h1>
    <form class="" action="register.php" method="post">
      <label for="uname">Username:</label>
      <input type="text" name="uname" value="">
      <br><br>
      <label for="mail">Email:</label>
      <input type="email" name="mail" value="">
      <br><br>
      <label for="password1">Password:</label>
      <input type="password" name="password1" value="">
      <br><br>
      <label for="password2">Confirm Password:</label>
      <input type="password" name="password2" value="">
      <br><br>
      <button type="submit" name="submit">Signup</button>
      <br>
      <p>Already a member? <a href="login.php">Login</a>
      </p>
    </form>
	</main>
  </body>
</html>