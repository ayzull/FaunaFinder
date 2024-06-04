<?php
    require 'inc/sess.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Fauna Finder - Tickets</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <?php 

        require 'inc/header.php';

  ?>
  
  <main>
    <section>
      <h2>Tickets</h2>
      <p>Choose the type of ticket you would like to purchase:</p>
      <ul class="ticket-types">
        <li class="ticket-item">
          <h3>General Admission</h3>
          <p>Access to all animal exhibits and shows.</p>
          <a href="#" class="btn">Buy Now</a>
        </li>
        <li class="ticket-item">
          <h3>VIP Experience</h3>
          <p>Exclusive guided tour, behind-the-scenes access, and VIP seating.</p>
          <a href="#" class="btn">Buy Now</a>
        </li>
        <!-- Add more ticket items as needed -->
      </ul>
    </section>
  </main>
  
  <?php
      require 'inc/footer.php';
  ?>
</body>
</html>
