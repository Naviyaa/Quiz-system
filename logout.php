<?php require_once("includes/functions.php") ?>
<?php require_once("includes/sessions.php") ?>

<?php

  $_SESSION["UserId"]=null ;
  $_SESSION["UserName"]=null ;
  session_destroy();
  header("Location: login.php");
  exit;

 ?>
