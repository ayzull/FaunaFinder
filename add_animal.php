<?php
    require 'inc/sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Animals | Fauna Finder</title>
    <link rel="stylesheet" href="css/Animals-page/add_animal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php 

        require 'inc/header.php';

    ?>
    <div class="container">
        <h2>New Animal</h2>
        <p>Please take the moment to fill out the form.</p>
        <form action="functions.php" method="POST" enctype="multipart/form-data">
            <label>Name</label>
            <input type="text" name="name" required>
            <label>Scientific Name</label>
            <input type="text" name="sciencename" required>
            <label>Gestation Period *</label>
            <input type="text" name="period" required>
            <label>Country of Origin *</label>
            <input type="text" name="country" required>
            <label>Habitat</label>
            <input type="text" name="habitat" required>
            <label>Food</label>
            <input type="text" name="food" required>
            <label>Image</label>
            <input type="file" name="image" required>
            <label>Fun Fact</label>
            <textarea name="fact" id="fact" cols="30" rows="5"></textarea>
            <button name="add_animal" type="submit">Add</button>
        </form>
    </div>

    <?php
        require 'inc/footer.php';
    ?>
</body>
</html>