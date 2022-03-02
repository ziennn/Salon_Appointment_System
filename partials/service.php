<?php
?>
<!-- service html -->
<section id="service" class="se-container">
  <div class="se-title">
    <h2 class="se-h2">Our Services</h2>
    <p class="se-p">Pick one from our many service that you can afford ranging from Hand & Foot Care, Hair-Cut, Style, Make-Up, and Massage.</p>
  </div>

  <?php
  $sql = "SELECT * FROM `category`";
  $res = $_connection->query($sql);

  if ($res->num_rows > 0) {

    // fetch all category on database
    while ($row = $res->fetch_assoc()) {

      $name = $row['name'];


      echo "<div class='se'><div class='se-box'>
        <label class='se-label'>" . $name . "</label> <p class='se-description'>" . $row['discription'] . "</p>
      </div>";



      // fetch colums of eatch category
      $_sql = "SELECT * FROM service_list
      WHERE category='$name'";
      $_res = $_connection->query($_sql);


      if ($_res->num_rows > 0) {
        echo "<div class='se-box table'>
        <table class='se-table'>
        <tr>
          <th>Services</th>
          <th>Price</th>
        </tr>";
        
        while ($_rows = $_res->fetch_assoc()) {
          echo "<tr><td>" . $_rows['name'] . "</td><td>" .$_rows['price'] ."</td></tr>";
        }
      }
      echo "</table></div>
      <button class='se-reserve'>Reserve Now</button>
      </div>";
    }
  }
  ?>

</section>