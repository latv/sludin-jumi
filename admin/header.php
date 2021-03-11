<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h1 id="maintitle">Administratora panelis</h1>
<div class="topnav" id="myTopnav">
<ul>
  <a href="index.php">Sākums</a>
  <a href="index.php?action=editcategories">kategorijas</a>
  <?php if (isset($_SESSION["login"])){?>
 
  <a href="index.php?action=logout">izlogoties</a>

  <?php } ?>
  <?php if (!isset($_SESSION["login"])){?>
    <a href="index.php?action=login">Ielogoties</a>


  <?php } ?>
</ul>
</div>