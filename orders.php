<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
    <?php
        $query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
        $noOrders = !mysqli_num_rows($query_res) > 0;
    ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h4>My Orders</h4>
            <?php
                if(!$noOrders){
                    echo '<a class="btn btn-primary" href="bill.php">View Bill</a>';
                }
            ?>
        </div>

        <table class="table mt-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    
                    if($noOrders)
                    {
                        echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                    }
                    else
                    {			                
                        while($row=mysqli_fetch_array($query_res))
                        {
                    ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>₹ <?php echo $row['price']; ?></td>
                    <td><?php
                        $status=$row['status'];
                        if($status=="" or $status=="NULL")
                        {
                            echo '<button class="text-info bg-info-subtle border border-info-subtle p-2 rounded-2">Dispatched</button>';
                        }
                        
                        if($status=="in process")
                        {
                            echo '<button class="text-warning bg-warning-subtle border border-warning-subtle p-2 rounded-2">On the way</button>';
                        }
                        
                        if($status=="closed")
                        {
                            echo '<button class="text-success bg-success-subtle border border-success-subtle p-2 rounded-2">Delivered</button>';
                        }

                        if($status=="rejected")
                        {
                            echo '<button class="text-danger bg-danger-subtle border border-danger-subtle p-2 rounded-2">Cancelled</button>';
                        }
                        
                    ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-sm btn-danger">Remove</a></td>
                </tr>
                <?php }
                        }
                        ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
}
?>