<?php
    require 'inc/sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grab Your Tickets NOW at Fauna Finder!</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/Packages-page/package.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php 

        require 'inc/header.php';

    ?>

    <section>
            <h2>Grab your tickets now!</h2>
            <table>
                <tr>
                    <th>Package</th>
                    <th>Details</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>Basic</td>
                    <td>Acess to general exhibits and animal shows.</td>
                    <td>Adult - RM40, Children - RM20,  Senior Citizen - RM30</td>
                </tr>
                <!-- <tr>
                    <td>Family</td>
                    <td>Access to general exhibits and animal shows for a family of four (2 adults and 2 children).</td>
                    <td>RM 100</td>
                </tr> -->
                <tr>
                    <td>Annual Pass</td>
                    <td>Unlimited access to the zoo for one year.</td>
                    <td>RM 200 per person.</td>
                </tr>
            </table>
            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ ?>
            <button onclick="window.open('book.php', '_self')">Buy Now</button>
            <?php }else{ ?>
            <button onclick="window.open('login.php', '_self')">Login To Buy</button>
            <?php } ?>
    </section>

    <?php
        require 'inc/footer.php';
    ?>
</body>
</html>