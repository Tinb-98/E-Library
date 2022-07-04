<?php
require 'config.php';

$conn = mysqli_connect($server, $user, $password, $database) or

die("can't open connection");

if(isset($_POST['btn-upload']))

{    

    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="uploadedBooks/";


    $new_size = $file_size/1024;  
 
 
    $new_file_name = strtolower($file);
 
 
    $final_file=str_replace(' ','-',$new_file_name);
 
    if(move_uploaded_file($file_loc,$folder.$final_file))
         {
          $sql="INSERT INTO Try(file,type,size) VALUES('$final_file','$file_type','$new_size')";
          mysqli_query($conn, $sql);
          ?>

  <script>

  alert('successfully uploaded');

        window.location.href='library.php?success';

        </script>

  <?php

 }

 else

 {

  ?>

  <script>

  alert('error while uploading file');

        window.location.href='library.php?fail';

        </script>

  <?php

 }

}

?>