<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 11/3/2017
 * Time: 7:00 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temporary";

// Creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
$col_name1 = $_POST['cname1'];
$col_name2 = $_POST['cname2'];
$col_name3 = $_POST['cname3'];
$col_value1 = $_POST['val1'];
$col_value2 = $_POST['val2'];
$col_value3 = $_POST['val3'];
$sql = "INSERT INTO `sub1`(`$col_name1`, `$col_name2`, `$col_name3`) VALUES ($col_value1,'$col_value2','$col_value3')";
$result = mysqli_query($conn,$sql);
if($result)
{
    echo "hurray";
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}