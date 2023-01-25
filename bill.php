<?php
include("connection/connect.php");
error_reporting(0);
session_start();
   $uid = $_SESSION["user_id"];
   $query = "SELECT * FROM users WHERE u_id = ".$uid;
   $result1 = mysqli_query($db,$query);
   $user = mysqli_fetch_array($result1);
   
   $viewQuery = "CREATE VIEW v_order AS SELECT * FROM users_orders WHERE u_id = ".$uid.";";
   $viewQueryResult = mysqli_query($db,$viewQuery);

   $selectQuery = "SELECT * FROM v_order;";
   $result = mysqli_query($db,$selectQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Bill</title>
    <link rel="stylesheet" href="css/common.css">
</head>

<body>

    <div class="container  mt-5">
    <form id="PrintTable">
        <div class="d-flex">
            <img src="images/logo.png" alt="Logo" width="36" height="30" class="d-inline-block align-text-center">
            <h3 class='font-weight-bold logo-font ms-2'>Food Frenzy</h3>
        </div>
        <div class="my-5">
            <h6>Billing Details:</h6>
            <p>Name: <span class="fw-semibold"><?php echo $user['f_name']." ".$user['l_name']; ?></span>
                <br>
                Address: <span class="fw-semibold"><?php echo $user['address']; ?></span>
            </p>
        </div>

        <table class='table table-borderless'>
            <thead>
                <tr>
                    <th scope='col'>Order ID</th>
                    <th scope='col'>Title</th>
                    <th scope='col'>Quantity</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $total = 0;
            while($row=mysqli_fetch_assoc($result))
            {
               ?>
                <tr>
                    <td><?php echo $row['o_id']; ?> </td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>₹ <?php echo ((int)$row['price']); ?></td>
                    <td><?php echo $row['date']; ?></td>
                </tr>
                <?php
               $total = $total + ((float)$row['price'] * (float) $row['quantity']);
            }
            ?>
            <tbody>
        </table>
        <hr>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4 ps-5">
                <h3> Total: ₹ <?php echo $total; ?></h3>
            </div>
        </div>
        <?php
         $deleteQuery = "DROP VIEW v_order;";
         mysqli_query($db,$deleteQuery);
      ?>
</form>
		<script>
			function printFunction() {
 			var printContents = document.getElementById('PrintTable').innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
}
</script>
		<input type="button" value="Print" onclick="printFunction()">

    </div>

</body>

</html>