<?php
    require 'inc/sess.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fauna Finder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/Index-page/styles.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php 

        require 'inc/header.php';

    ?>

    <main>
        <section>
            <h2>Welcome, Animal Lovers!</h2>
            <p style="color: #c8eebe; font-weight: 200;">Learn more about animals through artificial intelligence by
                capturing pictures of animal <br>at the zoo. You can explore the zoo, plan your trip, or share your experience.
                Enjoy your day!</p>
            <button><a href="animals.php">Find Animals</a></button><br>
            <button><a href="package.php">Buy Your Tickets Now</a></button>
        </section>
    </main>

    <?php
        require 'inc/footer.php';
    ?>
</body>

</html>