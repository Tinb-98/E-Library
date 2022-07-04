<?php
session_start();
if(!isset($_SESSION['logged'])|| $_SESSION['logged']!=true){
    header("Location:signInPage.php");
}
?>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .SignOutButton{
            position:absolute;
            top:5px;
            right:5px;
            color:red;

        }
        .AddBookButton{
            position:absolute;
            top:5px;
            left:5px;
        }
        .List{
            
        }
    </style>
    <head>
            <title>Library</title>
    <div class="SignOutButton">
    <input type="button" onclick="location.href='signOut.php'" value="Logout"  />
    </div>
    <div class="AddBookButton">
    <input type="button" onclick="location.href='uploadBook.php'" value="Add Book" class="btn btn-success btn-lg btn-block" />
    </div>
<center>
    <h3>Welcome to Book For All! </h3>
    <h3>where everyone can get all the wanted books for free </h3>
        <br /><br /><br />
</center>
<center>
<div class="List">
    <table border=0>
    <tr>
        <th><a href="buisness.php">Business</a></th>
    </tr>
    <tr>
        <th><a href="autoBiographies.php">Autobiography</a></th>
    </tr>
    <tr>
        <th><a href="novels.php">Novels</a></th>
    </tr>
    <tr>
        <th><a href="programming-IT.php">IT/Programming</a></th>
    </tr>
    <tr>
        <th><a href="selfHelp.php">Self-Help</a></th>
    </tr>
    <tr>
        <th><a href="romance.php">Romance</a></th>
    </tr>
    <tr>
        <th><a href="magazines.php">Magazines</a></th>
    </tr>
    </table>
</div>
</center>


    
</head>

<body>
<table>
    
</table>

</body>
</html>
