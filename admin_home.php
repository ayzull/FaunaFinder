<?php
    require 'inc/sess.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Fauna Finder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/Home-page/admin_home.css'>
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
            <h2>Welcome to the Jungle, Admin!</h2>
            <p style="color: #c8eebe; font-weight: 200;">You have logged in to your zoo website. You can discover the
             amazing world <br>of animals and manage your dashboard.</p>
            <a href="add_animal.php"><button id="addbtn" style="margin: 0px; color: #aeff9c;" >Add Animals</button></a>
            <button><a href="update.php">View Animals</a></button>
        </section>
    </main>

    <?php
        require 'inc/footer.php';
    ?>
</body>
</html>