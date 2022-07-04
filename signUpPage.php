<?php
session_start();
if(isset($_SESSION['logged']) && $_SESSION['logged']=true){
    header("Location: library.php");
}
if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['pass'])) {
    $Fname = strip_tags(addslashes($_POST['firstname']));
    $Lname = strip_tags(addslashes($_POST['lastname']));
    $Uname = strip_tags(addslashes($_POST['username']));
    $pword = strip_tags(addslashes($_POST['pass']));
    
    require 'config.php';
    $con = mysqli_connect($server, $user, $password, $database);
    if(!$con)
      die("Could not connect to the server. " .mysqli_connect_error());

    $result = mysqli_query($con, "INSERT INTO Users VALUES('$Uname', unhex(sha2('$pword', 256)),'$Fname','$Lname')");
    header("Location: library.php");

mysqli_close($con);
} // end if
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Sign up</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="signup-form">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
		<h2>Register</h2>
		<p class="hint-text">Create your account</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="signInPage.php">Sign in</a></div>
    </form>
</div>
</body>

</html>