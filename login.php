<?php
    require 'inc/sess.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fauna Finder: Login</title>
        <link rel="stylesheet" href="css/Login-page/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php 

            require 'inc/header.php';

        ?>

        <div class="logins">
            <div class="container1">
                <h2>Sign in</h2>
                <p>Sign in by entering your email/username and password</p>
                <form action="functions.php" method="POST">
                    <label for="email">Email *</label>
                    <input type="text" id="email" name="email">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password">
                    <button name="login" type="submit">Submit</button>
                </form>      
            </div>
            <div class="container2">
                <img src="image/Login-page/bg.jpg" alt="Zoo Background">
            </div>
        </div>
        <?php
            require 'inc/footer.php';
        ?>
    </body>
</html>