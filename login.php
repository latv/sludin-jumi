<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<meta charset="UTF-8">
<title>Pieteikties</title>
</HEAD>
<BODY>
<h1>Pieteikties</h1>
<?php 


if (isset($_POST['submit'])) {
	
	$sql = "SELECT * FROM users WHERE username='".$_POST["username"]."'";
	
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
		// output data of each row
		$pagerow = mysqli_fetch_row($result);
		if ($_POST['password'] == $pagerow["2"]) {
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["userid"] = $pagerow["0"];
			if ($pagerow["3"] == "admin") { 
				$_SESSION["login"] = "admin";
				header('Location: index.php'); 
				} 
			else {
				$_SESSION["login"] = "user";
				header('Location: index.php');
				}	
		} else { echo "Parole nav pareiza!<br><br>"; }
		
	} else	{ echo "Lietotājvārds nav pareizs!<br><br>"; }
}
?>
<form action="" method="POST">
<input type="text" name="username" placeholder="Ievadiet lietotājvārdu" required><br><br>
<input type="password" name="password" placeholder="Ievadiet paroli" required><br><br>
<input type="submit" name="submit" value="Pieteikties">
<a href="index.php?action=register" style="margin-left: 10px;">Reģistrēties</a>
</form>
</BODY>
</HTML>