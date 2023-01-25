<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php'; 

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dishes | Food Frenzy</title>
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
                    <a class="nav-link active" href="index.php">Home</a>
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
    <div class="container">
        <div class="row">
            <?php 
        $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
        $rows=mysqli_fetch_array($ress);
?>
            <div class="d-flex gap-4 justify-content-between align-items-center col-8 mt-5 mb-4 bg-primary-subtle p-4 rounded-4">
                
                <div>
                    <h5><?php echo $rows['title']; ?></h5>
                    <p><?php echo $rows['address']; ?></p>
                </div>
                
                <div>
                    <img class="object-fit-cover rounded-2" src="images/restaurants/<?php echo $rows['image']; ?>"
                        alt="Restaurant" width="150" height="100">
                </div>
            </div>
            <h4>Menu</h4>
            <div class="list-group col-8">

                <?php  
					$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
					$stmt->execute();
					$products = $stmt->get_result();
					if (!empty($products)) 
					{
						foreach($products as $product)
					    {
                ?>
                <div class="list-group-item d-flex gap-4 py-3 align-items-center" aria-current="true">
                    <?php echo
                        '<img src="images/dishes/'.$product['img'].'" alt="Dish" width="134" height="100"
                        class="flex-shrink-0 object-fit-cover rounded-2">'
                        ?>

                    <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
                        <div class="w-100">
                            <h6 class="mb-0"><?php echo $product['title']; ?></h6>
                            <p class="mb-0 opacity-75"><?php echo $product['slogan']; ?></p>
                        </div>
                        <form class="text-end" method="post"
                            action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                            <div>
                                <h5 class="d-inline me-2">₹<?php echo ((int)$product['price']); ?></h5>
                                <input class="w-25 d-inline text-center" type="number" name="quantity" value="1"
                                    required>
                            </div>
                            <input class="btn btn-primary mt-2" type="submit" name="submit" value="Add to cart">

                        </form>
                    </div>
                </div>
                <?php
                    }
                }
            ?>
            </div>

            <div class="col-4 bg-secondary-subtle p-4 rounded-4">
                <h5>Your cart</h5>
                <div class="d-flex flex-column justify-content-between h-100">
                    <div class="w-auto">
                        <?php
                            $item_total = 0;
                            foreach ($_SESSION["cart_item"] as $item)  
                            {
                        ?>
                        <div class="d-flex gap-3 py-3 px-2">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <h6 class="mb-0"><?php echo $item["title"]; ?></h6>
                                    <a class="text-decoration-none fw-semibold p-1"
                                        href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>"
                                        style="color: red; font-size: .8rem;">Remove</a>
                                </div>
                                <div>
                                    <p class="mb-0 opacity-75">
                                        <?php echo "₹ ".((int)$item["price"])." x ".$item["quantity"] ; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $item_total += ($item["price"]*$item["quantity"]); 
                        } 
                        ?>
                        <hr>
                        <h4 class="text-end">Total: <?php echo "₹ ".$item_total; ?></h4>
                    </div>

                    <div class="d-grid mb-4">
                        <a class="btn btn-primary" href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"
                            role="button">Procced
                            to
                            pay</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>