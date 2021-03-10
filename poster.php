<table style="width:100%">
  <tr>
    <th>Nr.</th>    
    <th>kategorija</th>
    <th>Sludinājuma teksts</th>
    <th>Telefona numurs</th>
  </tr>
  <?php
// lietotāja ievada
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;

//pozīcija

$start = ($page > 1) ? ($page * $perPage) - $perPage: 0;
$end = $perPage+$start;
$total = $conn->query("SELECT COUNT(*) as total FROM poster;")->fetch_assoc()['total'];
$pages= ceil($total / $perPage);
$sql = "SELECT * FROM poster LIMIT {$start}, {$end}";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    $i=1+(($page-1)*$perPage);
  while($row = $result->fetch_assoc()) {

       echo '<tr><td>'.$i.'</td><td>'.$row["category"].'</td><td>',$row["text"],'</td><td>',$row["phone_number"],'</td></tr>';
        $i++;
  }
} else {
  echo "nav sadaļu";
}
?>
</table>

<div class="pagination">
    <?php for($x=1; $x <= $pages; $x++): ?>
        <a href="?page=<?php echo $x; ?>" > <?php echo $x; ?> <a>
    <?php endfor; ?>

</div>
