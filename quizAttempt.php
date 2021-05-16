<?php require_once("includes/connect.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>
<?php
$_SESSION["trackingURL"]=$_SERVER["PHP_SELF"];
 login_confirm();
?>
<?php 	
	$tid = $_GET['topicId'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quiz</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
	<h3>Answer the questions below. Submit the quiz to get the results.</h3>
	<?php
		global $con;
		$sq = "SELECT SUM(marks) FROM quiz WHERE topic_id=$tid";
		$stm = $con->query($sq);
		$total = $stm->fetch();
	?>
	<p style="color: #4C1919;">Total Marks: <?php echo $total[0]; ?></p>
	<form method="post" action="results.php?topicId=<?php echo $tid; ?>">
	<?php
		$sr=0;
		$q=0;
		global $con;
		$sql = "SELECT * FROM quiz WHERE topic_id=$tid";
		$stmt = $con->query($sql);
		while($dataRows=$stmt->fetch()){
			$quesId = $dataRows['qid'];
			$ques = $dataRows['question'];
			$opt1 = $dataRows['opt-a'];
			$opt2 = $dataRows['opt-b'];
			$opt3 = $dataRows['opt-c'];
			$opt4 = $dataRows['opt-d'];
			$ans = $dataRows['ans'];
			$mks = $dataRows['marks'];
			$sr++;
	?>
	<div class="ques">
		<p><?php echo $sr.". ".$ques; ?></p>
		<input type="radio" name="opt<?php echo $q; ?>" value="<?php echo $opt1; ?>"><?php echo $opt1; ?>
		<br><br>
		<input type="radio" name="opt<?php echo $q; ?>" value="<?php echo $opt2; ?>"><?php echo $opt2; ?>
		<br><br>
		<input type="radio" name="opt<?php echo $q; ?>" value="<?php echo $opt3; ?>"><?php echo $opt3; ?>
		<br><br>
		<input type="radio" name="opt<?php echo $q; ?>" value="<?php echo $opt4; ?>"><?php echo $opt4; ?>
		<br><br>
		<?php 
			$q++;
			} 
		?>
		<button type="submit" name="submit">Submit Quiz</button>
		<br><br>
	</div>
	</form>
	</main>
</body>
</html>