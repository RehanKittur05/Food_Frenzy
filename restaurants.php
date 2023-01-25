<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurants | Food Frenzy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar sticky-top bg-body">
            <a class="navbar-brand d-flex justify-content-center" href="index.php">
                <img src="images/logo.png" alt="Logo" width="36" height="30" class="d-inline-block align-text-top">
                <span class="ms-2 logo-font fs-3">Food Frenzy</span>
            </a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="restaurants.php">Restaurants</a>
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
    <div class="container mt-4">
        <h3>Restaurants</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 mt-2">
            <?php
                        $ress= mysqli_query($db,"select * from restaurant");  
                        while($rows=mysqli_fetch_array($ress))
                        {
                            $query= mysqli_query($db,"select * from res_category where c_id='".$rows['c_id']."' ");
                            $rowss=mysqli_fetch_array($query);
                            echo '
                            <div class="col">
                                <div class="card shadow-sm rounded-2">
                                    <img height=200 class="mt-2 mx-2 rounded-2 object-fit-cover rounded" src="images/restaurants/'.$rows['image'].'" alt="Restaurant">
                                    <div class="card-body text-center">
                                        <h5>'.$rows['title'].'</h5>
                                        <p class="card-text">'.$rows['address'].'</p>
                                        
                                        <div class="d-grid">
                                            <a class="btn btn-primary" href="dishes.php?res_id='.$rows['rs_id'].'" role="button">View Menu</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>