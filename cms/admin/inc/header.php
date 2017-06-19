<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
date_default_timezone_set ("Asia/Kolkata"); 
if($_SESSION["username"]==""||$_SESSION["password"]==""){
    session_destroy();
    header("Location:../index.php");
}
else
{
    define('pageclassconst', TRUE);
    include_once 'login/loginClass.php';
    $loginCheck=new loginClass();
    echo $loginCheck->checkCurrentSession();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Application Panel</title>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/signin.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        form{display:inline-block}
    </style>
  </head>

  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="add-pages.php">Add Pages</a></li>
            <li><a href="manage-pages.php">List Pages</a></li>
            <li><a href="../index.php">View Website</a></li>
          </ul>
            
            <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>