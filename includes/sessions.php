<?php

session_start();

function error_message(){
  if(isset($_SESSION["ErrorMessage"])){
    $output="<div class=\"error\">".htmlentities($_SESSION["ErrorMessage"])."</div>";
    $_SESSION["ErrorMessage"]=null;
    return $output;
  }
}

function success_message(){
  if(isset($_SESSION['SuccessMessage'])){
    $output="<div class=\"success\">".htmlentities($_SESSION["SuccessMessage"])."</div>";
    $_SESSION["SuccessMessage"]=null;
    return $output;
  }
}

 ?>