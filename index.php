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
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/style.css">
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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
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

        <img src="images/food_bg.png" class="position-absolute top-0 end-0 my-5 ms-5 object-fit-contain" height=600>

        <div class="w-50 d-flex flex-column justify-content-center"
            style="height: 90vh; padding-left:6rem; padding-right:6rem">

            <h1>Order <span class="delicious text-primary">Delicious</span> food<br>anytime, anywhere</h1>
            <p>Browse from our list of top dishes from a variety of restaurants, place your order and have food
                delivered to you in no time. Affordable, tasty and fast!</p>
            <div>
                <a class="btn rounded-pill btn-primary px-4" href="restaurants.php" role="button">Order now</a>
            </div>

        </div>
    </div>


    <section class="d-flex flex-column align-items-center justify-content-around mt-2 bg-primary text-light"
        style="height: 70vh;">
        <div class="text-center">
            <h1>Easy to Order</h1>
            <p class="opacity-75">Order your favourite food in 3 simple steps</p>
        </div>
        <div class="steps-container text-center">
            <div class="step-box step1">
                <div class="icon-circle">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512" height="512">
                        <path
                            d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z" />
                        <path
                            d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z" />

                    </svg>
                </div>
                <div>
                    <h4>Choose a restaurant</h4>
                    <p>We"ve got your covered with menus from a variety of delivery restaurants online.</p>
                </div>
            </div>
            <div class="step-box step2">
                <div class="icon-circle">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 380.721 380.721" width="512"
                        height="512">
                        <path
                            d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" />

                    </svg>
                </div>
                <h4>Choose a dish</h4>
                <p>We"ve got your covered with a variety of delivery restaurants online.</p>
            </div>
            <div class="step-box step3">
                <div class="icon-circle">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 612.001 612" width="512"
                        height="512">
                        <path
                            d="M604.131 440.17h-19.12V333.237c0-12.512-3.776-24.787-10.78-35.173l-47.92-70.975a62.99 62.99 0 0 0-52.169-27.698h-74.28c-8.734 0-15.737 7.082-15.737 15.738v225.043h-121.65c11.567 9.992 19.514 23.92 21.796 39.658H412.53c4.563-31.238 31.475-55.396 63.972-55.396 32.498 0 59.33 24.158 63.895 55.396h63.735c4.328 0 7.869-3.541 7.869-7.869V448.04c-.001-4.327-3.541-7.87-7.87-7.87zM525.76 312.227h-98.044a7.842 7.842 0 0 1-7.868-7.869v-54.372c0-4.328 3.541-7.869 7.868-7.869h59.724c2.597 0 4.957 1.259 6.452 3.305l38.32 54.451c3.619 5.194-.079 12.354-6.452 12.354zM476.502 440.17c-27.068 0-48.943 21.953-48.943 49.021 0 26.99 21.875 48.943 48.943 48.943 26.989 0 48.943-21.953 48.943-48.943 0-27.066-21.954-49.021-48.943-49.021zm0 73.495c-13.535 0-24.472-11.016-24.472-24.471 0-13.535 10.937-24.473 24.472-24.473 13.533 0 24.472 10.938 24.472 24.473 0 13.455-10.938 24.471-24.472 24.471zM68.434 440.17c-4.328 0-7.869 3.543-7.869 7.869v23.922c0 4.328 3.541 7.869 7.869 7.869h87.971c2.282-15.738 10.229-29.666 21.718-39.658H68.434v-.002zm151.864 0c-26.989 0-48.943 21.953-48.943 49.021 0 26.99 21.954 48.943 48.943 48.943 27.068 0 48.943-21.953 48.943-48.943.001-27.066-21.874-49.021-48.943-49.021zm0 73.495c-13.534 0-24.471-11.016-24.471-24.471 0-13.535 10.937-24.473 24.471-24.473s24.472 10.938 24.472 24.473c0 13.455-10.938 24.471-24.472 24.471zm117.716-363.06h-91.198c4.485 13.298 6.846 27.54 6.846 42.255 0 74.28-60.431 134.711-134.711 134.711-13.535 0-26.675-2.045-39.029-5.744v86.949c0 4.328 3.541 7.869 7.869 7.869h265.96c4.329 0 7.869-3.541 7.869-7.869V174.211c-.001-13.062-10.545-23.606-23.606-23.606zM118.969 73.866C53.264 73.866 0 127.129 0 192.834s53.264 118.969 118.969 118.969 118.97-53.264 118.97-118.969-53.265-118.968-118.97-118.968zm0 210.864c-50.752 0-91.896-41.143-91.896-91.896s41.144-91.896 91.896-91.896c50.753 0 91.896 41.144 91.896 91.896 0 50.753-41.143 91.896-91.896 91.896zm35.097-72.488c-1.014 0-2.052-.131-3.082-.407L112.641 201.5a11.808 11.808 0 0 1-8.729-11.396v-59.015c0-6.516 5.287-11.803 11.803-11.803 6.516 0 11.803 5.287 11.803 11.803v49.971l29.614 7.983c6.294 1.698 10.02 8.177 8.322 14.469-1.421 5.264-6.185 8.73-11.388 8.73z" />

                    </svg>
                </div>
                <h4>Pick up or Delivery</h4>
                <p>Get your food delivered! And enjoy your meal! </p>
            </div>
        </div>
    </section>
    <div class="container my-5">
        <section class="my-5">
            <div class="text-center">
                <h2>Popular Dishes</h2>
                <p>Check our popular dishes and get discounts on all our meals and swift delivery to your location.
                </p>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-1">
                <?php 					
						$query_res= mysqli_query($db,"select * from dishes LIMIT 6"); 
                        while($r=mysqli_fetch_array($query_res))
                        {
                            echo '
                            <div class="col">
                                <div class="card shadow-sm rounded-3">
                                    <img class="mt-2 mx-2 object-fit-cover rounded-3" src="images/dishes/'.$r['img'].'" alt="Dish"
                                    height=296>
                                    <div class="card-body text-center  h-100">
                                        <h5 class="card-text">'.$r['title'].'</h5>
                                        <p class="card-text text-secondary">'.$r['slogan'].'</p>
                                        <div class="d-flex justify-content-between align-items-center mt-4">
                                            <h4>₹ '.((int)$r['price']).'</h4>
                                            
                                            <a href="dishes.php?res_id='.$r['rs_id'].'" role="button" class="btn btn-primary bg-green">Order now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    ?>
            </div>

        </section>

        <div class="my-5">
            <br>
        </div>
        <section class="my-5">

            <div class="d-flex justify-content-between mb-3">
                <h4>Featured Restaurants</h4>
                <!-- <div>
                        <a class="btn btn-primary rounded-pill" href="#" role="button">All</a>
                        <?php 
							$res= mysqli_query($db,"select * from res_category");
							while($row=mysqli_fetch_array($res))
							{
								echo '<a class="btn btn-outline-secondary rounded-pill ms-1" href="#" data-filter=".'.$row['c_name'].'">'.$row['c_name'].'</a>';
							}
						?>
                    </div> -->
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
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

        </section>

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