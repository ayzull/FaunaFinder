
<?php
    require 'inc/sess.php';
    require 'inc/config.php';
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        $uid = $_SESSION['id'];
        $sql = "SELECT * FROM booking INNER JOIN `bookingdetail` ON booking.booking_id = bookingdetail.booking_id WHERE booking.userid = $uid ";
        $result = mysqli_query($conn, $sql);

    }else{
         echo "<script>window.location.href='index.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservation | Fauna Finder</title>
    <link rel="stylesheet" href="css/Packages-page/reservation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php 

        require 'inc/header.php';

    ?>
    
    <div class="container">
        <h1>My Reservation</h1>
        <table>
            <tr class="head">
                <th>No</th>
                <th>Type of Package</th>
                <th>Quantity</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
            <tbody>
                <?php

                    if (mysqli_num_rows($result) > 0) {
                        $count = 1;
                      while($row = mysqli_fetch_assoc($result)) {

                        if($row['package'] == 'basic'){
                            $text = "<div>Adult: ".$row['adult_qty']." <br> Children: ".$row['child_qty']." <br> Senior Citizen: ".$row['senior_qty']."</div>";
                            $title = 'Basic';
                        }else{
                            $text = "<div>Qty: ".$row['annual_qty']."</div>";
                            $title = 'Annual';
                        }

                        echo "<tr>
                                <td>$count</td>
                                <td>".$title."</td>
                                <td style='text-align: left;'>

                                    ".$text."

                                </td>
                                <td>".$row['email']."</td>
                                <td>".$row['phone']."</td>
                                <td>RM".$row['totalamount']."</td>
                                <td>".$row['created_at']."</td>

                            </tr>";
                         $count++;
                      }
                    } else {
                        echo "<tr><td colspan='8'>No Booking Yet</td></tr>";
                    }


                ?>
            </tbody>
        </table>
    </div>

    <?php
        require 'inc/footer.php';
    ?>
</body>
</html>
