<?php

session_start();
 
require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';
 
if(isset($_POST['login']))
{
	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		$email 		= trim($_POST['email']);
		$password 	= trim($_POST['password']);

    $password = '-'.$password.'-';
    $password = str_replace("-","'",$password );
    $email = '-'.$email.'-';
    $email = str_replace("-","'",$email );

	$md5Password = ($password); //md5($password);


    $stmt = $link->prepare('SELECT * FROM users WHERE email = '.$email.' && password = '.$md5Password.' ');
    
    $stmt->execute();
    $rs = $stmt->fetchAll();


		$getNumRows = sizeof($rs);
		
		if($getNumRows == 1)
		{

      $_SESSION["start"] = "allowed";
	  if($rs[0][1] == 'admin'){
		$_SESSION["right"] = '1';
	  }else{
		$_SESSION["right"] = '0';
	  }
	  header("Location:show/show_p1.php");

			exit;
		}
		else
		{
			$errorMsg = "Wrong email or password";
		}
	}
}
 
if(isset($_GET['logout']) && $_GET['logout'] == true)
{
	session_destroy();
	header("location:index.php");
	exit;
}
 
 
if(isset($_GET['lmsg']) && $_GET['lmsg'] == true)
{
	$errorMsg = "Login required to access dashboard";
}


  ?>



<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LOGIN</title>
  <!-- Bootstrap core CSS-->
   	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
   	<link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
   	<link href="assets/css/sb-admin.css" rel="stylesheet">
 
 
 
 
<div class="container">
 
<div class="card card-login mx-auto mt-5">
 
<div class="card-header">Login</div>
 
 
<div class="card-body">
		<?php 
			if(isset($errorMsg))
			{
				echo '
<div class="alert alert-danger"-->';
				echo $errorMsg;
				echo '</div>
';
				unset($errorMsg);
			}
		?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
 
<div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="email" placeholder="Enter email" required="">
</div>
 
 
<div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password" required="">
</div>
 
          <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
        </form>
       
</div>
 
</div>
 
  
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
 