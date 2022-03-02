<?php
require_once('./dbConfig.php');
?>


<h1 class="team-title">OUR SERVICES</h1>

<section class="service_2">
  <?php
  $sql = "SELECT * FROM category";
  $res = $_connection->query($sql);
  ?>

  <?php if ($res->num_rows > 0) { ?>
    <?php while ($row = $res->fetch_assoc()) {
      $name = $row['name']; ?>
      <div class="serv-2-box">
        <div class="serv-2-div">
          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
          <h4><?php echo $name; ?></h4>
        </div>
        <?php
        $_sql = "SELECT * FROM service_list WHERE category='$name'";
        $_res = $_connection->query($_sql);
        if ($_res->num_rows > 0) { ?>
          <div class="serv-2-list">
            <?php while ($_row = $_res->fetch_assoc()) { ?>
              <div>
                <p><?php echo $_row['name'] ?></p>
                <p><?php echo $_row['price'] ?></p>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
        <a id="book-now" href="./apointment.php">BOOK ONLINE</a>
        <p style="visibility:hidden;">______________________</p>     
      </div>
    <?php } ?>
  <?php } else { ?>
    <p class="status error">Image(s) not found...</p>
  <?php } ?>


</section>