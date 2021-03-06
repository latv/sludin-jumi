<?php
session_start();
//pārbauda, vai lietotājs ir pierakstījies

include 'admin/config.php';
?>
<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="admin.css">
<title>Lietotāja panelis</title>
</HEAD>

<BODY>
<div id="wrapper">

<div id="header">
<?php include 'header.php';?>
</div>

<div id="page">
<?php
if (!isset($_GET["action"])) {
	echo "<h2>Esiet sveicināti Lietotāja panelī!</h2>";
    include 'poster.php';	
} else {
	if ($_GET["action"] == 'editposter') { include 'editposter.php'; }
	if ($_GET["action"] == 'login') { include 'login.php'; }
    if ($_GET["action"] == 'addposter') { include 'addposter.php'; }
    
    if ($_GET["action"] == 'register') { include 'register.php'; }
    if ($_GET["action"] == 'logout') {
        session_destroy();
        session_unset();
        header('Location: index.php');
    }
	
}

?>
</div>

<div id="footer">
</div>

</div><!-- beidzas wrapper -->
</BODY>
</HTML>