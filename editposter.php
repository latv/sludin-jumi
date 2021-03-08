<?php
if(isset($_GET['delete'])){

    $sql = "DELETE FROM poster WHERE id=".$_GET["delete"];
    
    if ($conn->query($sql) === TRUE) {
      echo "kategorija (ar datubāzes id=".$_GET["delete"].") veiksmīgi izdzēsta!<br>";
    } else {
      echo "Kļūda dzēšot sadaļu: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

if (isset($_GET["post_edit"]))
{

    $sql = "UPDATE poster SET
category='".$_POST["category"]."',
text='".$_POST["text"]."',
phone_number='".$_POST["phone_number"]."'
WHERE id=".$_GET['post_edit'];
if ($conn->query($sql) === TRUE) {
    echo "Sludinājums veiksmīgi atjaunināts!<br><br>";

  } else {
    echo "Kļūda rediģējot sludinājumu: " . $sql . "<br>" . $conn->error . "<br><br>";
  }	


}






if (isset($_GET["poster_id_edit"])){

$sql = "SELECT * FROM poster where id='".$_GET["poster_id_edit"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  while($row = $result->fetch_assoc()) {
    
       $category=$row["category"];
       $text=$row["text"];
       $phone_number=$row["phone_number"];
       $selected_date=$row["selected_date"];
       
  }
} else {
  echo "Notikusi kļūda";
}

?>

<form action="<?php echo $_SERVER['REQUEST_URI']."&post_edit=".$_GET["poster_id_edit"] ?>" method="post">

kategorijas: <select name="category" id="category" value="<?php echo $category ?>">

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
teksts: <textarea type="text" name="text" ><?php echo $text ?></textarea><br>
telefona numurs: <input type="number" name="phone_number" value="<?php echo $phone_number ?>"><br>
termiņš   <select id="term" name="term" value="<?php echo $selected_date ?>">
    <option value="1">1 diena</option>
    <option value="2">1 nedēļa</option>
    <option value="3">2 nedēļa</option>
    <option value="4">Mēnesis</option>
  </select>
<input type="submit" value="atjaunināt" name="submit">
</form>

<?php



}
?>



<?php





$sql = "SELECT * FROM poster where user_id='".$_SESSION["userid"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i=1;
  while($row = $result->fetch_assoc()) {
    
       echo '<p>'.$i.'. '.$row["category"].' '.$row["text"].$row["phone_number"].'<a href="'.'index.php?action=editposter&poster_id_edit='.$row["id"].'" > Rediģēt</a>'.' <a href="'.$_SERVER['REQUEST_URI'].'&delete='.$row["id"].'" > dzēst</a>'.'</p>';
       $i++;
  }
} else {
  echo "nav sludinājumu ko mainīt";
}




?>