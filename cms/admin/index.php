<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
include_once 'messages/alertClass.php';
$message=new alertClass();
if(isset($_POST["login"])){
    $username=$_POST["Username"];
    $password=$_POST["Password"];
    
    if($username==""||$password==""){
        $alert=$message->getAlert("Please enter both the values", "error");
    }
    else
    {
        define('pageclassconst', TRUE);
        include_once 'login/loginClass.php';
        $logincheck=new loginClass();
        $alert=$logincheck->checkLogin($username,$password);
    }
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
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/signin.css" type="text/css">
  </head>
<body>

    <div class="container">
        <?php echo $alert; ?>
        <form class="form-signin" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="Username" name="Username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="Password" name="Password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
