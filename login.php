<?php
    include("connection/connect.php"); 
    error_reporting(0); 
    session_start(); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	    $username = $_POST['username'];  
	    $password = $_POST['password'];
	
	    if(!empty($_POST["submit"]))   
        {
	        $loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
	        $result=mysqli_query($db, $loginquery); //executing
	        $row=mysqli_fetch_array($result);
	
	        if(is_array($row)) {
                $_SESSION["user_id"] = $row['u_id']; 
				header("refresh:1;url=index.php"); 
            }
            else {
                $message = "Invalid Username or Password!"; 
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
    <title>Login | FoodFrenzy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">

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

    <div class="container-fluid d-flex align-items-center justify-content-center" style="height:80vh;">
        <main class="card p-4 form-signin w-100 text-center rounded-3">
            <form method="post">
                <h3 class="my-4">Welcome Back</h3>
                <?php 
                    if(!empty($message))   
                    {
                        echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
                    }
                ?>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="username" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <input class="w-100 btn btn-lg btn-primary mt-4" type="submit"name="submit" value="Log in">
                <!-- <button  type="submit">Log in</button> -->
                <div class="mt-5">Not registered?<a href="register.php" class="text-decoration-none fw-semibold"> Create
                        an account</a></div>
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