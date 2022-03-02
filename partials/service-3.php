<?php
?>
<section class="serv-list m-top">
  <div class="se-title">
    <h2 class="se-h2">Our Services</h2>
    <p class="se-p">Pick one from our many service that you can afford ranging from Hand & Foot Care, Hair-Cut, Style, Make-Up, and Massage.</p>
  </div>
  <?php
  $sql = "SELECT * from service_list";
  $res = $_connection->query($sql);

  if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
  ?>

      <div class="serv-item">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
        <h3 class="serv-h3"><?php echo $row['name'] ?></h3>
        <p class="price-1"><?php echo "P ".$row['price'] ?></p>
        <p style="visibility: hidden;">_____________</p>
        <a class="serv-link" href="./apointment.php">SET AN APPOINTMENT</a>
        <p style="visibility: hidden;">_____________</p>
      </div>

    <?php }
  } else { ?>
    <p>Not Found</p>

  <?php } ?>
</section>