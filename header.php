<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h1 id="maintitle">Lietotāja panelis</h1>
<div class="topnav" id="myTopnav">

<ul>
  <a href="index.php">Sākums</a>
  <?php if (isset($_SESSION["login"])){?>
  <a href="index.php?action=editposter">Sludinājuma rediģēšana</a>
  <a href="index.php?action=editposter">Profils</a>
  <a href="index.php?action=addposter">Pievienot sludinājumu</a>  
  <a href="index.php?action=logout">izlogoties</a>

  <?php } ?>
  <?php if (!isset($_SESSION["login"])){?>
    <a href="index.php?action=login">Ielogoties</a>
  <a href="index.php?action=register">Registrēties</a>

  <?php } ?>

  
</ul>
</div>