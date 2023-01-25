<?php
session_start(); 
error_reporting(0); 
include("connection/connect.php"); 

$uid = $_SESSION["user_id"];
if(!empty($uid))
{
    $userQuery = "SELECT * FROM `users` WHERE `u_id` = ".$uid;
    $userResult = mysqli_query($db, $userQuery);
    $user = mysqli_fetch_array($userResult);
}else{
    echo "Not logged in";
}

if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) || 
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['address'])
     )
		{
			$message = "All fields must be Required!";
		}
	else
	{

        if(strlen($_POST['phone']) < 10)  
        {
        echo "<script>alert('Invalid phone number!');</script>"; 
        }

        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
        }
        else{  
            $mql = "UPDATE users SET f_name='".$_POST['firstname']."',l_name='".$_POST['lastname']."',email ='".$_POST['email']."',phone='".$_POST['phone']."',address='".$_POST['address']."' WHERE u_id = ".$uid.";";
            mysqli_query($db, $mql);
            echo "<script>alert('Details update successfully!');</script>"; 
            header("refresh:0.1;url=index.php");
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
    <title>Profile | FoodFrenzy</title>

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
                        <input type="text" class="form-control" id="firstname"
                        placeholder="fname"
                         name="firstname" value="<?php echo $user['f_name'] ?>" required>
                        <label for="firstname">First name</label>
                    </div>

                    <div class="form-floating col-6 mb-2 ms-1">
                        <input placeholder="lname" type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['l_name'] ?>" required>
                        <label for="lastname">Last name</label>
                    </div>
                </div>


                <div class="form-floating mb-2 col-12">
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?php echo $user['username'] ?>" readonly required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-2 col-12">
                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $user['email'] ?>" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-2 col-12">
                    <input type="phone" class="form-control" placeholder="Phone" id="phone" name="phone" value="<?php echo $user['phone'] ?>" required>
                    <label for="phone">Phone number</label>
                </div>
                <div class="form-floating col-12">
                    <input name="address" type="text" placeholder="Address" class="form-control" value="<?php echo $user['address'] ?>" id="address" required>
                    <label for="address">Delivery address</label>
                </div>

                <input class="w-100 btn btn-lg btn-primary mt-4" type="submit" name="submit" value="Update details">

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