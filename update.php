<?php
    require 'inc/sess.php';
    require 'inc/config.php';

    $sql = "SELECT * from animal";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Animals - Fauna Finder</title>
    <link rel="stylesheet" href="css/Animals-page/update.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 

        require 'inc/header.php';

    ?>

    <div class="container">
        <h1>List of Animals</h1>
        <table>
            <thead>
                <tr class="tablehead">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Scientific Name</th>
                    <th>Gestation Period</th>
                    <th>Origin</th>
                    <th>Habitat</th>
                    <th>Food</th>
                    <th>Fun Fact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                ?>

                        <tr>
                            <td>
                                <img src="image/upload/<?php echo $row['image'] ?>" class="imgbox"/>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>
                            <td>
                                <?php echo $row['scientific_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['gestation_period'] ?>
                            </td>
                            <td>
                                <?php echo $row['country_origin'] ?>
                            </td>
                            <td>
                                <?php echo $row['habitat'] ?>
                            </td>
                            <td>
                                <?php echo $row['food'] ?>
                            </td>
                            <td style="text-align: left; width: 200px;">
                                <?php 

                                    if ($row['fun_fact']  && strlen($row['fun_fact']) > 60) {
    
                                        $fact = substr($row['fun_fact'],0, 80);
                                        $fact .= '...';
                                        $class = "text-left";

                                    }else{

                                        $fact = $row['fun_fact'];
                                        $class = "text-center";


                                    }
                               


                                ?>
                                <p class="<?php echo $class; ?>"><?php echo $fact ?></p>
                            </td>
                            <td>
                                <div class="flex">
                                    <a href="edit_animal.php?eid=<?php echo $row['animal_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                     <form method="POST" action="functions.php" onsubmit="javascript:return confirm('Confirm to delete animal info?')">
                                         <input value="<?php echo $rows['animal_id'] ?>" name="aid" type="hidden" />
                                         <input value="<?php echo $rows['image'] ?>" name="imagepath" type="hidden" />
                                         <button type="submit" name="delete_aninmal" style="background: transparent;"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                                
                            </td>

                        </tr>

                <?php
                      }
                    } else {
                ?>

                        <tr><td colspan="8">No Data Yet</td></tr>;

                <?php
                     
                    }

                ?>
    
            </tbody>
            
        </table>

    </div>
    <script>
        getShortName(val,length = 20) {
            let name = val;
            if (val && val.length > length) {
                name = name.slice(0, length-1)
                name += '...'
            }
            return name
        }
    </script>
</body>

</html>