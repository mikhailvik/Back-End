
<?php
$target_dir = "uploads/";
$uploadOk = 1;

if(isset($_REQUEST["submit"])) {
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 200000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

 
  // Allow only JPG, JPEG, and PNG files
  if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
 }
 

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

      // Display uploaded files
      $files = scandir($target_dir);
      echo "<h3>Previous Profile Pictures:</h3><ul>";
      foreach($files as $file) {
        if ($file !== '.' && $file !== '..') {
          echo "<li><img src='$target_dir$file' alt='$file' width='100'></li></br>";
        }
      }
      echo "</ul>";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

}
?>