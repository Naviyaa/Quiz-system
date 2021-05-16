<?php require_once("includes/connect.php") ?>
<?php require_once("includes/sessions.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
$_SESSION["trackingURL"]=$_SERVER["PHP_SELF"];
 login_confirm();
?>
<?php

	if(isset($_POST['submit'])){
		$tid = $_POST['topicId'];
		if(empty($tid)){
			header("Location: quiz.php");
			exit;
		}else{
		header("Location: quizAttempt.php?topicId=".$tid);
		exit;
		}
	}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quiz List Page</title>
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	<header>
		<nav>
			<a href="index.php">Back to Main Page</a>
			<a href="dashboard.php">To the Dashboard</a>
			<a href="logout.php">Logout</a>
		</nav>
	</header>
	<main>
    <h1>QUIZZES!!</h1>
	<h3>Choose which quiz you want to attempt and click on the button.</h3>
	<form method="post" action="quiz.php">
		<?php 
			global $con;
			$sql = "SELECT * FROM topics ORDER BY tid";
			$stmt = $con->query($sql);
			while ($dataRows=$stmt->fetch()) {
              $topicId = $dataRows['tid'];
              $title=$dataRows['title'];
              $tShort=$dataRows['title_short'];		
		?>
		<input type="radio" name="topicId" value="<?php echo $topicId; ?>"><?php echo $title; ?>
		<br><br>
		<?php }?>
		<button type="submit" name="submit">Attempt Quiz</button>
		<br><br>
	</form>
	</main>
  </body>
</html>
