<?php
if ((isset($_POST['submit']))) { 
 
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
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
  
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
    
    $sql = "INSERT INTO poster (user_id, category, text, phone_number, selected_date,image )
    VALUES ('".$_SESSION["userid"]."', '".$_POST["category"]."', '".$_POST["text"]."', '".$_POST["phone_number"]."', '".
    $_POST["term"]."' ,  '".
    basename($_FILES["fileToUpload"]["name"])."')";
    
    if ($conn->query($sql) === TRUE) {
      echo "sludinajums veiksmīgi pievienots!<br><br>";
    } else {
      echo "Kļūda pievienojot sludinājumu: " . $sql . "<br>" . $conn->error . "<br><br>";
    }
    } 
  
?>




<form action="" method="post" enctype="multipart/form-data">

kategorijas: <select name="category" id="category">

<?php
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
	
       echo '<option value="',$row["category"],'">',$row["category"].'</option>';
       
  }
} else {
  echo "nav sadaļu";
}
?>
</select>
<br>
Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br>

teksts: <textarea type="text" name="text"></textarea><br>
telefona numurs: <input type="number" name="phone_number"><br>
termiņš   <select id="term" name="term">
    <option value="1">1 diena</option>
    <option value="2">1 nedēļa</option>
    <option value="3">2 nedēļa</option>
    <option value="4">Mēnesis</option>
  </select>
<input type="submit" value="submit" name="submit">
</form>