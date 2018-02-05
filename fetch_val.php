<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 10/17/2017
 * Time: 10:06 AM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temporary";

// Creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$output = '';
$cname = $_POST['cid'];
$sql = "SELECT value FROM `$cname` ORDER BY value";
$result = mysqli_query($conn,$sql);

$output = '<option value = "">Select a Value</option>';
while ($row = mysqli_fetch_array($result))
{
    $output .= '<option value = "'.$row["value"].'">'.$row["value"].'</option>';
}
echo $output;
?>

