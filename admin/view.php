<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

$sql=" CREATE VIEW V_SS AS SELECT * FROM `logs`";
$dql=" SELECT * FROM V_SS";
$result=mysqli_query($db,$sql);
$result2=mysqli_query($db,$dql);
//find the number of rows returned
$num_rows=mysqli_num_rows($result2);
echo $num_rows;
echo "records found in the database";
echo "<br>";

//display the rows returned by the sql query
//the rows can be displayed only when no. of rows >0
if($num_rows>0)
{
    // $row=mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
    // $row=mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
    // $row=mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
    // $row=mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
    // $row=mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
    // $row=mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
     while($row=mysqli_fetch_assoc($result2))
     {
        // echo var_dump($row);
        // echo "<br>";
        echo $row['id']."  ".$row['u_id']." ".$row['address']." ".$row['cdate'];
        echo "<br>";



     }

}
?>