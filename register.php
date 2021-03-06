<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<meta charset="UTF-8">
<title>Reģistrēties</title>
</HEAD>
<BODY>

<?php
include 'admin/config.php';

if (isset($_POST["submit"])) {
	//pārbaudam, vai forma tikai aizpildīta
	
	//sagastavojam SQL pieprasījumu
	$sql = "INSERT INTO users (username, password, role)
	VALUES ('".$_POST["username"]."', '".$_POST["password"]."', 'user')";
//echo $sql; - šādi var pārbaudīt SQL vaicājumu

	if ($conn->query($sql) === TRUE) {
		echo "Lietotājs pievienots!";
	} else {
		echo "Kļūda " . $sql . "<br>" . $conn->error;
	}
} //beidzas pārbaude, vai forma ir aizpildīta
?>

<h1>Reģistrēties</h1>

<form action="" method="POST">
<input type="text" name="username" placeholder="Ievadiet lietotājvārdu" required><br><br>
<!-- <input type="text" name="nicname" placeholder="Ievadiet segvārdu" required><br><br>
<input type="text" name="email" placeholder="Ievadiet e-pastu" required><br><br> -->
<input type="password" name="password" placeholder="Ievadiet paroli" required><br><br>
<input type="submit" name="submit" value="Reģistrēties">

</form>

</BODY>
</HTML>