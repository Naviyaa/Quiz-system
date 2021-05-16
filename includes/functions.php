<?php require_once("includes/connect.php") ?>
<?php

function login_confirm(){
  if(isset($_SESSION['UserId'])){
    return true;
  }else{
    $_SESSION["ErrorMessage"]= "Login Required";
    header("Location: login.php");
  }
}

function login_attempt($username, $password){
	global $con;
	$sql="SELECT * FROM users WHERE username=:userName AND password=:passWord LIMIT 1";
	$stmt=$con->prepare($sql);
	$stmt->bindValue(':userName',$username);
	$stmt->bindValue(':passWord',$password);
	$stmt->execute();
	$result=$stmt->rowcount();
	if($result==1){
		$fetch_account = $stmt->fetch();
		return $fetch_account;
	}else{
		return null;
	}
}

?>