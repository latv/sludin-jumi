<h1 id="maintitle">Lietotāja panelis</h1>
<div id="menu">
<ul>
  <li><a href="index.php">Sākums</a></li>
  <?php if (isset($_SESSION["login"])){?>
  <li><a href="index.php?action=editposter">Sludinājuma rediģēšana</a></li>
  <li><a href="index.php?action=editposter">Profils</a></li>
  <li><a href="index.php?action=addposter">Pievienot sludinājumu</a></li>  
  <li><a href="index.php?action=logout">izlogoties</a></li>

  <?php } ?>
  <?php if (!isset($_SESSION["login"])){?>
    <li><a href="index.php?action=login">Ielogoties</a></li>
  <li><a href="index.php?action=register">Registrēties</a></li>

  <?php } ?>

  
</ul>
</div>