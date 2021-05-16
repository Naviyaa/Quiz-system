<?php require_once("includes/connect.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>
<?php
	$_SESSION["trackingURL"]=$_SERVER["PHP_SELF"];
	login_confirm();
	$userId = $_SESSION["UserId"];
	$userName = $_SESSION["UserName"];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	<header>
		<nav>
			<a href="index.php">QUIZZES</a>
			<a href="quiz.php">Take Quizzes</a>
			<a href="logout.php">Logout</a>
		</nav>
	</header>
	<main>
		<h1 style="text-decoration: none;">WELCOME BACK - <span style="color: #000000;"> <?php echo htmlentities($userName); ?> </span> </h1>
		<h4>Here are the results for the quizzes you have taken till now: </h4>
		<table style="border: 2px solid #000000; padding: 10px;">
			<thead>
				<tr>
					<th> Sr. No. </th>
					<th> Topic </th>
					<th> Abbr. (topic) </th>
					<th> Marks Scored </th>
					<th> Maximum Marks </th>
				</tr>
			</thead>
			<?php
				$sr=0;
				global $con;
				$sql = "SELECT * FROM results,topics WHERE user_id=$userId AND results.topic_id=topics.tid ORDER BY rid DESC";
				$stmt = $con->query($sql);
				while($dataRows = $stmt->fetch()){
					$topic = $dataRows['title'];
					$tShort = $dataRows['title_short'];
					$total_marks = $dataRows['total_marks'];
					$max_marks = $dataRows['max_marks'];
					$sr++;
			?>
			<tbody>
				<tr>
					<td><?php echo htmlentities($sr); ?></td>
					<td><?php echo htmlentities($topic); ?></td>
					<td><?php echo htmlentities($tShort); ?></td>
					<td><?php echo htmlentities($total_marks); ?></td>
					<td><?php echo htmlentities($max_marks); ?></td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	</main>
  </body>
</html>