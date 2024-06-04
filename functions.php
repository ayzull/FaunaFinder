<?php

	include 'inc/config.php';
	session_start();


	// new function
	// user
	if(isset($_POST['register'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $conpass = $_POST['conpass'];
    
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $current = date('Y-m-d H:i:s'); 

        if($password !== $conpass){
        	echo '<script>
					  alert("Password not matched");
					  window.location.href = "register.php";
					</script>';
			die();
        }

        $sql = "SELECT * FROM user where email = '$email'";
	    $result = mysqli_query($conn, $sql);

	    if (mysqli_num_rows($result) > 0) {

	   		  	echo '<script>
					  alert("This email is registered before.");
					  window.location.href = "register.php";
					</script>';
				die();

	    }else{

	        
	    		$role = "user";
	            $sql = "INSERT INTO user (firstname, lastname, username, email, password, created_at, role) VALUES ('$fname', '$lname', '$username', '$email','$password', '$current', '$role')";

	            $query_run = mysqli_query($conn, $sql);
	           
	            if ($query_run) {

		     
		   			echo '<script>
					  alert("Successfully create new user");
					  window.location.href = "login.php";
					</script>';
		        
		      	} else {
		
		   			echo '<script>
					  alert("Failed to create new user");
					  window.location.href = "register.php";
					</script>';

		      	}

	        

	    }

    }

    if(isset($_POST['login'])){

		$email = $_POST['email'];
      	$pass = $_POST['password'];
      	$sql = "SELECT * FROM user where email = '$email'";
	    $result = mysqli_query($conn, $sql);
			
			if(mysqli_num_rows($result) > 0){

			
					$row = mysqli_fetch_assoc($result);

					$pwDb = $row['password'];
					$sid = $row['userid'];
					$semail= $row['email'];
					$role= $row['role'];


					if($pwDb == $pass){
		
						$_SESSION['id'] = $sid;
						$_SESSION['email'] = $semail;
						$_SESSION['role'] = $role;


						if($role == 'user'){
							echo '<script>
							  window.location.href = "user_home.php";
							</script>';
						}else{
							echo '<script>
							  window.location.href = "admin_home.php";
							</script>';
						}

			  
									  
					}else{

						echo '<script>
							  alert("Invalid Credential");
							  window.location.href = "login.php";
							</script>';

					}

			}else{


				echo '<script>
					  alert("Invalid Credential");
					  window.location.href = "login.php";
					</script>';


			}
		  
	}

	// add animal

	if( isset($_POST['add_animal']) ){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $science =  mysqli_real_escape_string($conn, $_POST['sciencename']);
        $period =  mysqli_real_escape_string($conn, $_POST['period']);
        $country =  mysqli_real_escape_string($conn, $_POST['country']);
        $habitat =  mysqli_real_escape_string($conn, $_POST['habitat']);
        $food =  mysqli_real_escape_string($conn, $_POST['food']);
        $fact =  mysqli_real_escape_string($conn, $_POST['fact']);
    
        if(isset($_FILES['image']['name']) && $_FILES['image']["name"] != '' ){

            $img = $_FILES['image'];
            $filename = date('YmdHis').'_'.(str_replace(' ','',$img['name']));
            $path = $img['tmp_name'];
            $move = move_uploaded_file($path,'image/upload/'.$filename);

            $sql = "INSERT INTO animal (name, scientific_name, gestation_period, country_origin, habitat, food, fun_fact, image) VALUES ('$name', '$science', '$period' ,'$country' ,'$habitat', '$food', '$fact', '$filename')";

            $query_run = mysqli_query($conn, $sql);

           
            if ($query_run) {

            	echo '<script>
					  alert("Successfully add new animal information");
					  window.location.href = "add_animal.php";
					</script>';

	      		
	        
	      	} else {

	      		echo '<script>
					  alert("Failed to add new animal information");
					  window.location.href = "add_animal.php";
					</script>';
		      
	      	}

        }


    }

    if(isset($_POST['update_animal'])){

    	$id = $_POST['id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $science =  mysqli_real_escape_string($conn, $_POST['sciencename']);
        $period =  mysqli_real_escape_string($conn, $_POST['period']);
        $country =  mysqli_real_escape_string($conn, $_POST['country']);
        $habitat =  mysqli_real_escape_string($conn, $_POST['habitat']);
        $food =  mysqli_real_escape_string($conn, $_POST['food']);
        $fact =  mysqli_real_escape_string($conn, $_POST['fact']);
        $oldpath = $_POST['oldpath'];
       
	    	$sql = "UPDATE animal SET name='$name', scientific_name = '$science', gestation_period = '$period',country_origin ='$country', habitat = '$habitat', food = '$food', fun_fact = '$fact' ";
	        
	        if(isset($_FILES['image']['name']) && $_FILES['image']["name"] != '' ){

	            $img = $_FILES['image'];
	            $filename = date('YmdHis').'_'.(str_replace(' ','',$img['name']));
	            $path = $img['tmp_name'];
	            $move = move_uploaded_file($path,'image/upload/'.$filename);

	            if($move){
	            	$sql .= ", image = '$filename'";
	            	if(!empty($oldpath)){
			              if (file_exists("image/upload/".$oldpath)) {
			                  unlink("image/upload/".$oldpath);
			              } 
			        }
	            }

	        }

	        $sql .= "WHERE animal_id = '$id'";

	        if (mysqli_query($conn, $sql)) {

	   			echo '<script>
					  alert("Successfully update animal information");
					  window.location.href = "update.php";
					</script>';
	        
	      	} else {
		        
		        echo '<script>
					  alert("Failed to update animal information");
					  window.location.href = "update.php";
					</script>';

	      	}

    }

    if(isset($_POST['delete_animal'])){

        $id = $_POST['aid'];
        $oldpath = $_POST['imagepath'];

        if(!empty($oldpath)){
              if (file_exists("image/upload/".$oldpath)) {
                  unlink("image/upload/".$oldpath);
              } 
        }

        $sql = "DELETE FROM animal WHERE animal_id='$id'";

        if(mysqli_query($conn, $sql)){
            echo "<script>
                    alert('Successfully delete info!');
                    window.location.href= 'update.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to delete info!');
                    window.location.href= 'update.php';
                  </script>";
        }
       
    }


    if( isset($_POST['pay']) ){

        $package = mysqli_real_escape_string($conn, $_POST['package']);
        $totalqty =  mysqli_real_escape_string($conn, $_POST['totalqty']);
        $adult =  mysqli_real_escape_string($conn, $_POST['adult']);
        $children =  mysqli_real_escape_string($conn, $_POST['children']);
        $old =  mysqli_real_escape_string($conn, $_POST['old']);
        $total =  mysqli_real_escape_string($conn, $_POST['total']);
        $fname =  mysqli_real_escape_string($conn, $_POST['fname']);
        $lname =  mysqli_real_escape_string($conn, $_POST['lname']);
        $email =  mysqli_real_escape_string($conn, $_POST['email']);
        $phone =  mysqli_real_escape_string($conn, $_POST['phone']);
        $uid =  mysqli_real_escape_string($conn, $_POST['uid']);
        $status = "Paid";
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $current = date('Y-m-d H:i:s'); 
    
     
        $sql = "INSERT INTO booking (firstname, lastname, email, phone, totalamount, status, created_at, userid) VALUES ('$fname', '$lname', '$email' ,'$phone' ,'$total', '$status', '$current', '$uid')";

        $query_run = mysqli_query($conn, $sql);

       
        if ($query_run) {

        	$last_id = mysqli_insert_id($conn);

        	$sql1 = "INSERT INTO bookingdetail (package, adult_qty, child_qty, senior_qty, annual_qty, booking_id) VALUES ('$package', '$adult', '$children' ,'$old' ,'$totalqty', '$last_id')";
        
        	mysqli_query($conn, $sql1);

        	echo '<script>
				  alert("Successfully make booking");
				  window.location.href = "reservation.php";
				</script>';

      		
        
      	} else {

      		echo '<script>
				  alert("Failed to make booking");
				  window.location.href = "book.php";
				</script>';
	      
      	}

        


    }




	// profile

	if(isset($_POST['update-user'])){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
                
        $sql = "UPDATE user SET user_name='$name', user_contact = '$mobile' ";

        if(isset($password) && !empty($password)){

          $sql .= ", user_password = '$password'";

        }

        $sql .= "WHERE user_id = '$id'";

        $query_run = mysqli_query($conn, $sql);
           
        if ($query_run) {

            echo '<script>
					  alert("Successfully update profile info");
					  window.location.href = "account.php";
				 </script>';
        
        } else {
            echo '<script>
					  alert("Failed to update profile info");
					  window.location.href = "account.php";
				 </script>';
        }      
        
    }

  


  
	function returnMsg($msgR, $statusR){

	   	$_SESSION['msg'] = $msgR;
	    $_SESSION['msg_status'] = $statusR;
	   
	}


	function returnMsgE($msgE, $statusE){

	   	$_SESSION['msgE'] = $msgE;
	    $_SESSION['msg_statusE'] = $statusE;
	   
	}

	function returnMsgL($msgL, $statusL){

	   	$_SESSION['msgL'] = $msgL;
	    $_SESSION['msg_statusL'] = $statusL;
	   
	}


	function returnSuccess($msg){

	  echo json_encode(array(
	    'msg' => $msg,
	    'status' => true
	  ));

	  exit();

	}


	function returnErr($msg){


	  echo json_encode(array(
	    'msg' => $msg,
	    'status' => false
	  ));

	  exit();

	}






?>