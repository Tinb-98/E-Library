<?php
session_start();
if(isset($_SESSION['logged']) && $_SESSION['logged']=true){
    header("Location: library.php");
}

if (!empty($_POST['username']) && !empty($_POST['pass'])) {
$username = strip_tags(addslashes($_POST['username']));
$pass = strip_tags(addslashes($_POST['pass']));
require 'config.php';

$conn = mysqli_connect($server, $user, $password, $database) or
die("can't open connection");

$sql = "select * from Users where Username = '$username' and Pass = unhex(sha2('$pass', 256))";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0)
    echo '<script>alert("Access denied wrong username or password")</script>';
else {
    //echo '<script>alert("Welcome to Book For All")</script>';
    $_SESSION['logged'] = true;
    header("Location: library.php");
}
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Sign in</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div>
    <br />
</div>
</head>
<body>
<div>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
		<h2>Login</h2>
        <div>
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <br>
		<div>
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
        <br>
		<div>
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Login</button>
        </div>
        <div class="text-center">You don't have an account? <a href="signUpPage.php">Register</a></div>
    </form>
	
</div>
</body>

</html>