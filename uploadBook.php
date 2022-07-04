<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Upload Books</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .backBtn{
        position: absolute;
        bottom:5px;
        left:5px;
    }
</style>
<div>
    <br />
</div>
</head>
<body>
<div>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
		<h2>Upload</h2>
		<div>
		    <input type="file" class="form-control" name="Book">
		</div>
		<br>
		<div>
            <input type="text" class="form-control" name="Author" placeholder="Author's Name" required="required">
        </div>
        <br>
        <div>
        <select name="Genre" id="Genre" class="form-control" required="required">
        <option value="Buisness">Buisness</option>
        <option value="Self-Help">Self-Help</option>
        <option value="Magazines">Magazines</option>
        <option value="Romance">Romance</option>
        <option value="Novels">Novels</option>
        <option value="IT/Programming">IT/Programming</option>
        <option value="Auto-Biographies">Auto-Biographies</option>
        </select>
        </div>
        <br>
		<div>
            <button type="submit" name='btn-upload' class="btn btn-success btn-lg btn-block">Add Book</button>
        </div>
        <div class="backBtn">
            <input type="button" onclick="location.href='library.php'" value="Back"  class="form-control" />
        </div>
        <?php
            require 'config.php';
            
            if (!empty($_POST['Author']) && !empty($_POST['Genre'])){
                $auth = strip_tags(addslashes($_POST['Author']));
                $gen = strip_tags(addslashes($_POST['Genre']));
               
                
            
            $conn = mysqli_connect($server, $user, $password, $database) or
            
            die("can't open connection");
            
            if(isset($_POST['btn-upload']))
            
            {    

                $file =$_FILES['file']['name'];
                $file_loc = $_FILES['file']['tmp_name'];
                $file_size = $_FILES['file']['size'];
                $file_type = $_FILES['file']['type'];
                $folder="uploadedBooks/";
            
            
                $new_size = $file_size/1024;  
             
             
                $new_file_name = strtolower($file);
             
             
                $final_file=str_replace(' ','-',$new_file_name);
             
                if(move_uploaded_file($file_loc,$folder.$final_file))
                     {
                      $sql="INSERT INTO Books(file,type,size,author,genre) VALUES('$final_file','$file_type','$new_size', $auth,$gen)";
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
            }
            ?>
    </form>
    
    <?php
 if(isset($_GET['success']))
        echo'<script>alert("Book Uploaded");</script>';
 else if(isset($_GET['fail']))
       echo'<script>alert("Uploading Failed , Please try again");</script>';
       ?>
</div>
</body>
</html>