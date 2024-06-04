<header>
    <p>CALL US: 123-456-7890</p>
    <nav>
        <a href="index.php"><img src="image/Index-page/logo.png" alt="Fauna Finder"></a>
        <ul>   
            <?php if(isset($_SESSION['role']) && !empty($_SESSION['role'])){ ?>

                <?php if($_SESSION['role'] == 'admin'){ ?>

                    <li><a href="admin_home.php">Home</a></li>   

                <?php }else{ ?>

                    <li><a href="user_home.php">Home</a></li>  

                <?php } ?>

            <?php }else{ ?>
                <li><a href="index.php">Home</a></li>
            <?php } ?>

            <?php if(isset($_SESSION['role']) && !empty($_SESSION['role'])){ ?>

                 <?php if($_SESSION['role'] == 'user'){ ?>

                    <li><a href="animals.php">Animals</a></li>
                    <li class="dropdown">
                        <a href="" class="dropbtn">Package</a>
                        <div class="dropdown-content">
                            <a href="package.php">Book Now</a>
                            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ ?>
                            <a href="reservation.php">Reservation</a>
                            <?php } ?>
                        </div>
                    </li> 

                <?php }else{ ?>

                    <li><a href="update.php">View Animals</a></li>
                    <li><a href="add_animal.php">Add Animals</a></li>

                <?php } ?>
           
            <?php }else{ ?>

            <li><a href="animals.php">Animals</a></li>
            <li class="dropdown">
                <a href="" class="dropbtn">Package</a>
                <div class="dropdown-content">
                    <a href="package.php">Book Now</a>
                    <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ ?>
                    <a href="reservation.php">Reservation</a>
                    <?php } ?>
                </div>
            </li>

            <?php } ?>

            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ ?>
                <!-- <li><a href="account.php">Account</a></li> -->
                <li><a href="logout.php">Logout</a></li>
            <?php }else{ ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>