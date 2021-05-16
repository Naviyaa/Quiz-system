<?php require_once("includes/connect.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>
<?php
	$_SESSION["trackingURL"]=$_SERVER["PHP_SELF"];
	login_confirm();
	$userId = $_SESSION["UserId"];
	//echo $userId;
?>
<?php 	
	$tid = $_GET['topicId'];
?>
<?php
	if(isset($_POST['submit'])){
		global $con;
		$sq = "SELECT COUNT(*) FROM quiz WHERE topic_id=$tid";
		$stm = $con->query($sq);
		$rows = $stm->fetch();
		for ($i=0;$i<$rows[0];$i++){
			$opt[$i] = $_POST['opt'.$i];
			//echo $opt[$i]."\n";			
		}
		$sql = "SELECT * FROM quiz WHERE topic_id=$tid";
		$stmt = $con->query($sql);
		$x=0;
		$total_marks=0;
		while($dataRows = $stmt->fetch()){
			$mks = $dataRows['marks'];
			//echo $mks;
			$ans = $dataRows['ans'];
			//echo $ans;
			if($opt[$x]==$ans){
				$total_marks+=$mks;
			}
			$x++;
		}
		//echo $total_marks;
		$s = "SELECT SUM(marks) FROM quiz WHERE topic_id=$tid";
		$st = $con->query($s);
		$max = $st->fetch();
		$max_marks = $max[0];
		
		$res = "INSERT INTO results(user_id, topic_id, total_marks, max_marks) VALUES(:uid, :tid, :tmks, :mmks)";
		$rst = $con->prepare($res);
		$rst->bindValue(':uid',$userId);
		$rst->bindValue(':tid',$tid);
		$rst->bindValue(':tmks',$total_marks);
		$rst->bindValue(':mmks',$max_marks);
		$exec = $rst->execute();
		if($exec){
			//header("Location: dashboard.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Results</title>
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
	<h1>CONGRATULATIONS ON COMPLETING THE QUIZ!!!</h1>
	<h4>Your Marks for this quiz are: </h4>
	<h4 class="res"><?php echo $total_marks." / ".$max_marks; ?></h4>
	<br><br>
	<p>Go back to the Dashboard to view your grades in the gradesheet.</p>
	</main>
</body>
</html>