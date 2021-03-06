

<?php
if(isset($_GET['delete'])){

    $sql = "DELETE FROM category WHERE id=".$_GET["delete"];
    
    if ($conn->query($sql) === TRUE) {
      echo "kategorija (ar datubāzes id=".$_GET["delete"].") veiksmīgi izdzēsta!<br>";
    } else {
      echo "Kļūda dzēšot sadaļu: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

if (isset($_POST['submit'])){
// $_POST["kategorija"]=$_POST["kategorija"];
// echo $_POST["kategorija"];
$sql = "SELECT * FROM category WHERE category='".$_POST["kategorija"]."'";
$result = $conn->query($sql);
$e1=$result->num_rows;
if ($e1>0 ) {echo "<p>Šāds kategorijas nosaukums jau eksistē!</p>";}
 else {

$sql = "INSERT INTO category (category) VALUES ('".$_POST["kategorija"]."')";

if ($conn->query($sql) === TRUE) {
  echo "kategorija ",$_POST["kategorija"]," veiksmīgi pievienota!<br><br>";
} else {
  echo "Kļūda pievienojot kategoriju: " . $sql . "<br>" . $conn->error . "<br><br>";
}
}}
?>

<form action="" method="POST">
  <label for="fname">Kategorijas:</label><br>
  <input type="text" id="category" name="kategorija" value=""><br>
 
  <input type="submit" value="submit" name="submit">
</form> 
<?php
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i=1;
  while($row = $result->fetch_assoc()) {
	// echo '<p><a href="?action=editpages&delete=',$row["id"],'">dzēst</a>';
	// echo ' <a href="?action=editpages&edit=',$row["id"],'">rediģēt</a>';
   	// echo ' ',$row["id"],'. ',$row["title"],' (/',$row["slug"],')</p>';
       echo '<p>'.$i.". ".$row["category"].' <a href="?action=editcategories&delete=',$row["id"],'">dzēst</a>'.'</p>';
       $i++;
  }
} else {
  echo "nav sadaļu";
}
?>