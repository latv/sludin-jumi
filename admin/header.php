<h1 id="maintitle">Administratora panelis</h1>
<div id="menu">
<ul>
  <li><a href="index.php">Sākums</a></li>
  <li><a href="index.php?action=editcategories">kategorijas</a></li>
  <?php if (isset($_SESSION["login"])){?>
 
  <li><a href="index.php?action=logout">izlogoties</a></li>

  <?php } ?>
  <?php if (!isset($_SESSION["login"])){?>
    <li><a href="index.php?action=login">Ielogoties</a></li>


  <?php } ?>
</ul>
</div>