<?php
if ((isset($_POST['submit']))) { 
 
    
    
    $sql = "INSERT INTO poster (user_id, category, text, phone_number)
    VALUES ('".$_SESSION["userid"]."', '".$_POST["category"]."', '".$_POST["text"]."', '".$_POST["phone_number"]."')";
    
    if ($conn->query($sql) === TRUE) {
      echo "sludinajums veiksmīgi pievienots!<br><br>";
    } else {
      echo "Kļūda pievienojot sludinājumu: " . $sql . "<br>" . $conn->error . "<br><br>";
    }
    } 
  
?>




<form action="" method="post">

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
teksts: <textarea type="text" name="text"></textarea><br>
telefona numurs: <input type="number" name="phone_number"><br>

<input type="submit" value="submit" name="submit">
</form>