<?php
require 'inc/sess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Fauna Finder</title>
    <link rel="stylesheet" href="css/Register-page/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php

    require 'inc/header.php';

    ?>

    <div class="register">
        <div class="container1">
            <h2>Get Started for Free</h2>
            <p>Sign in by completing the form below.</p>
            <form action="functions.php" method="POST">
                <table>
                    <tr>
                        <td><label>First Name *</label></td>
                        <td><label>Last Name *</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="fname" required></td>
                        <td><input type="text" name="lname" required></td>
                    </tr>
                    <tr>
                        <td><label>Email *</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Username</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Password *</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Re-enter Password *</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="password" name="conpass" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="register">Submit</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="imgcontainer">
            <img src="image/Register-page/bg.jpg" alt="Zoo Background">
        </div>
    </div>
    <?php
    require 'inc/footer.php';
    ?>
</body>

</html>