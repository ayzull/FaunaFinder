<?php
require 'inc/sess.php';
require 'inc/config.php';

if (!isset($_POST['package']) && empty($_POST['package'])) {
    echo "<script>window.location.href='book.php';</script>";
}

$uid = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE userid = $uid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_POST['package'] == 'basic') {
    $package = $_POST['package'];
    $totalqty = '';
    $adult = $_POST['adult'];
    $children = $_POST['children'];
    $old = $_POST['senior'];
    $total = $_POST['total'];
} else {
    $package = $_POST['package'];
    $totalqty = $_POST['totalqty'];
    $adult = '';
    $children = '';
    $old = '';
    $total = $_POST['total'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details | Fauna Finder</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/Packages-page/payment.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php

    require 'inc/header.php';

    ?>

    <div class="paycontainer">
        <h2>Payment Details</h2>
        <p>Please take a moment to fill out the form.</p>
        <form action="functions.php" method="POST">

            <input type="hidden" name="uid" value="<?php echo $uid; ?>">
            <input type="hidden" name="package" value="<?php echo $package; ?>">
            <input type="hidden" name="totalqty" value="<?php echo $totalqty; ?>">
            <input type="hidden" name="adult" value="<?php echo $adult; ?>">
            <input type="hidden" name="children" value="<?php echo $children; ?>">
            <input type="hidden" name="old" value="<?php echo $old; ?>">
            <input type="hidden" name="total" value="<?php echo $total; ?>">

            <input type="hidden" name="fname" value="<?php echo $row['firstname']; ?>">
            <input type="hidden" name="lname" value="<?php echo $row['lastname']; ?>">
            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">

            <label for="phonenumber">Phone Number</label>
            <input type="text" id="phonenumber" name="phone" placeholder="+6012-3456-789" required>
            <label for="paymethod">Card Number</label>
            <input type="text" placeholder="0123-4567-8901-2345" id="paymethod" required>
            <label for="cvv">CVV Code</label>
            <input type="text" id="cvv" placeholder="012" required>
            <input type="submit" value="Pay" name="pay">

        </form>
    </div>

    <?php
    require 'inc/footer.php';
    ?>
</body>

</html>