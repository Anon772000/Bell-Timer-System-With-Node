<?php
putenv('TMPDIR=/var/www/html');
$target_dir = "/var/www/html/assets/tones/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image



// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "mp3" && $imageFileType != "wav" && $imageFileType != "ogg" && $imageFileType != "aiff" && $imageFileType != "acc" && $imageFileType != "wma" && $imageFileType != "flac" && $imageFileType != "alac" && $imageFileType != "m4a" && $imageFileType != "mp4") {
  echo "Sorry, only mp3 & wav & ogg files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded. Code:00E-005";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($tmp_name, $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    $arry2 = array( "name" => $_POST['name'],"dir" => escapeshellcmd($target_file));
    $arr1 = json_decode(file_get_contents('assets/json/sounds.json'), true);
    $id = uniqid();
    $arr1[$id] = $arry2;
    file_put_contents("assets/json/sounds.json",json_encode($arr1));
    header("location: settings.php");
    
    
  } else {
    echo "Sorry, there was an error uploading your file. Code:00F-12";
    if (is_dir($tmp_name = $_FILES['fileToUpload']['tmp_name'])) {
      echo 'the temporary folder exists<br>';
    } else {
      echo 'the temp folder doesn\'t exist<br>';
    }
  }
}
?>
