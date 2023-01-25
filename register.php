<?php
session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) || 
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword'])
     )
		{
			$message = "All fields must be Required!";
		}
	else
	{
	
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  
       	
          echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6)  
	{
      echo "<script>alert('Password Must be >=6');</script>"; 
	}
	elseif(strlen($_POST['phone']) < 10)  
	{
      echo "<script>alert('Invalid phone number!');</script>"; 
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
          echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
    }
	elseif(mysqli_num_rows($check_username) > 0) 
     {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
	else{
       
	 
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
	
		 header("refresh:0.1;url=login.php");
    }
	}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | FoodFrenzy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">

</head>

<body>
    <div class="container-fluid">
        <nav class="navbar sticky-top bg-body">
            <a class="navbar-brand d-flex justify-content-center" href="#">
                <img src="images/logo.png" alt="Logo" width="36" height="30" class="d-inline-block align-text-top">
                <span class="ms-2 logo-font fs-3">Food Frenzy</span>
            </a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="restaurants.php">Restaurants</a>
                </li>
                <?php
                    if(empty($_SESSION["user_id"]))
                    {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>';
                        echo '<li class="nav-item">
                                <a class="nav-link" href="register.php">SignUp</a>
                            </li>';
                    }
                    else {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="profile.php">Profile</a>
                            </li>';
                            
                        echo '<li class="nav-item">
                                <a class="nav-link" href="orders.php">My orders</a>
                            </li>';

                        echo '<li class="nav-item">
                                <a class="nav-link" href="logout.php">Log out</a>
                            </li>';
                    }
                ?>
            </ul>

        </nav>
    </div>

    <div class="container d-flex align-items-center" style="height:100vh;">
        <main class="px-5 w-100 text-center rounded-3">
            <h3 class="mb-5">Welcome to Food Frenzy</h3>
            <form method="post">
                <?php 
                    if(!empty($message))   
                    {
                        echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
                    }
                ?>

                <div class="d-flex">
                    <div class="form-floating col-6 mb-2 me-1">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="lastname"required>
                        <label for="firstname">First name</label>
                    </div>

                    <div class="form-floating col-6 mb-2 ms-1">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="firstname" required>
                        <label for="lastname">Last name</label>
                    </div>
                </div>


                <div class="form-floating mb-2 col-12">
                    <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-2 col-12">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-2 col-12">
                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                    <label for="phone">Phone number</label>
                </div>
                <div class="form-floating col-12">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating col-12 mt-2">
                    <input name="cpassword" type="password" class="form-control" id="cpassword" placeholder="Password" required>
                    <label for="cpassword">Confirm password</label>
                </div>
                
                <div class="form-floating col-12 mt-2">
                    <input name="address" type="text" class="form-control" id="address" placeholder="address" required>
                    <label for="address">Delivery address</label>
                </div>

                <input class="w-100 btn btn-lg btn-primary mt-4" type="submit" name="submit" value="Register">

                <div class="mt-5">Already have account?<a href="login.php" class="text-decoration-none fw-semibold">
                        Register</a>

                </div>

            </form>
        </main>
    </div>
    <footer>
        <div class="container-fluid">

            <div class="row bg-dark align-items-center text-light"
                style="height: 50vh; padding-left:6rem; padding-right:6rem">
                <div class="col-4">
                    <h5>Payment Options</h5>
                    <div class="row align-items-start">
                        <div class="col-1">
                            <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                        </div>

                        <div class="col-1">
                            <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                        </div>

                        <div class="col-1">
                            <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                        </div>
                        <div class="col-1">
                            <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                        </div>
                    </div>

                </div>
                <div class="col-4">
                    <h5>Address</h5>
                    <p style="opacity: 0.66;">1086 Stockert Hollow Road, Seattle</p>
                    <h5>Phone: 75696969855</a></h5>
                </div>
                <div class="col-4">
                    <h5>Addition informations</h5>
                    <p style="opacity: 0.66;">Join thousands of other restaurants who benefit from having partnered with
                        us.</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>