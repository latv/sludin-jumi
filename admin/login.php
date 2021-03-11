<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<meta charset="UTF-8">
<title>Pieteikties</title>
</HEAD>
<BODY>
<h1>Pieteikties</h1>
<?php 
session_start();
include 'config.php';
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

				$sql = "SELECT * FROM poster";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				// output data of each row
				
				while($row = $result->fetch_assoc()) {
					
					switch ($row["selected_date"]) {
						case "1":
							$addTime = '+ 1 days';
							break;
						case "2":
							$addTime = '+ 1 weeks';
							break;
						case "3":
							$addTime = '+ 2 weeks';
							break;
						case "4":
							$addTime = '+ 1 months';
							break;
					}
					$date = new DateTime($row["date"]);
					
					if (date('d-m-Y',strtotime($date->format('d-m-Y').$addTime))<=date("d-m-Y"))

					{

						$sql_2 = "DELETE FROM poster WHERE id=".$row["id"];
    
						if ($conn->query($sql_2) === TRUE) {
						  echo "sludinājums (ar datubāzes id=".$_GET["delete"].") veiksmīgi izdzēsta!<br>";
						} else {
						  echo "Kļūda dzēšot sludinājumu: " . $sql . "<br>" . $conn->error . "<br>";
						}


					}
					
				}
				} else {
				echo "nav sadaļu";
				}

				header('Location: index.php'); 
				} 
			else {
				$_SESSION["login"] = "user";
				echo "Tu nav admin tiesības"; 
				}	
		} else { echo "Parole nav pareiza!<br><br>"; }
		
	} else	{ echo "Lietotājvārds nav pareizs!<br><br>"; }
}
?>
<form action="" method="POST">
<input type="text" name="username" placeholder="Ievadiet lietotājvārdu" required><br><br>
<input type="password" name="password" placeholder="Ievadiet paroli" required><br><br>
<input type="submit" name="submit" value="Pieteikties">
</form>
</BODY>
</HTML>