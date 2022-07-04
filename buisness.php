        <?php
        require 'config.php';
        $conn = mysqli_connect($server, $user, $password, $database) or
        die("can't open connection");
        ?>

<!DOCTYPE html>
<html>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
     .BackButton{
            position:absolute;
            top:5px;
            left:5px;
            color:red;
            </style>
    <title>Buisness Section</title>
    <div class="BackButton">
    <input type="button" onclick="location.href='library.php'" value="Back" class="btn btn-success btn-lg btn-block" />
    </div>
    <center><h3>Buisness Books</h3></center>
    </head>
    <body>
        <center>
        <table width="80%" border="1">
            <tr>
                <th colspan="5">Success is not final; failure is not fatal: it is the courage to continue that counts. – Winston Churchill</th>
            </tr>
            <tr>

                <td>Book Name</td>
            
                <td>Author</td>
            
                <td>Size(KB)</td>
            
                <td>Inspect</td>

             </tr>
             <?php

             $sql="SELECT * FROM Books where genre='Buisness'";
            
             $result_set=mysqli_query($conn, $sql);
            
             while($row=mysqli_fetch_array($result_set))
            
             {
            
              ?>
              <tr>

            <td><?php echo $row['file'] ?></td>
    
            <td><?php echo $row['type'] ?></td>
    
            <td><?php echo $row['size'] ?></td>
    
            <td><a href="uploadedBooks/<?php echo $row['file'] ?>" 

            target="_blank">view file</a></td>

            </tr>
    
            <?php
    
             } 
             ?> 
        </table>
        </center>
    </body>
    </html>