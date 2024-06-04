<?php
    require 'inc/sess.php';
    require 'inc/config.php';

    if(isset($_GET['eid']) && !empty($_GET['eid'])){
        $eid = $_GET['eid'];
        $sql = "SELECT * from animal where animal_id = $eid";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();

    }else{
        echo "<script>window.location.href='update.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Animals | Fauna Finder</title>
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
        <h2>Update Animal Information</h2>
        <p>Please take the moment to fill out the form.</p>
        <form action="functions.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['animal_id'] ?>" required>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $row['name'] ?>" required>
            <label>Scientific Name</label>
            <input type="text" name="sciencename" value="<?php echo $row['scientific_name'] ?>" required>
            <label>Gestation Period *</label>
            <input type="text" name="period" value="<?php echo $row['gestation_period'] ?>" required>
            <label>Country of Origin *</label>
            <input type="text" name="country" value="<?php echo $row['country_origin'] ?>" required>
            <label>Habitat</label>
            <input type="text" name="habitat" value="<?php echo $row['habitat'] ?>" required>
            <label>Food</label>
            <input type="text" name="food" value="<?php echo $row['food'] ?>" required>
            <label>Current Image</label>
            <div class="imgOuter">
                <img src="image/upload/<?php echo $row['image']; ?>" class="imgbox"/>
                <input type="hidden" name="oldpath" value="<?php echo $row['image'] ?>">
            </div>
            <label>New Image (Optional)</label>
            <input type="file" name="image">
            <label>Fun Fact</label>
            <textarea name="fact" id="fact" cols="30" rows="5"><?php echo $row['fun_fact'] ?></textarea>
            <button name="update_animal" type="submit">Save</button>
        </form>
    </div>

    <?php
        require 'inc/footer.php';
    ?>
</body>
</html>