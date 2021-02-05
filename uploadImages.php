<?php

include("config.php");

if(isset($_POST['varsubmit'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

    $name = $_POST['name'];
    $description = $_POST['description'];
    $codetype = $imageFileType;
    $code = $_POST['code'];

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
    // Upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      // Convert to base64 
      $imagedata = file_get_contents($target_file);
      $image_base64  = base64_encode($imagedata);
  
    // Insert record into a sql database
    $query = "insert into images(imageBase64, name, description, codetype, code) values('".$image_base64."',N'".$name."',N'".$description."',N'".$codetype."',N'".$code."')";
    mysqli_query($con,$query);


    //Finsh the Upload         
      echo "<br />The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "<br />Sorry, there was an error uploading your file.";
    }
    
  }
 
}
?>

<form method="post" action="" enctype='multipart/form-data'>
Image or Image URL:<input type='file' name='fileToUpload' /><p>
Name:<input type='text' name='name' /><p>
Description:<input type='text' name='description' /><p>
Code:<input type='text' name='code' /><p>
<input type='submit' value='Convert2Base64' name='varsubmit'>
</form>

<center><a href='viewImages.php'>View Image Datastore</a></center>
