<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 9/12/2017
 * Time: 9:56 AM
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
$col_name = $_POST['colname'];
$col_size = $_POST['colsize'];
$result1 = mysqli_query($conn, "CREATE TABLE {$_POST['tname']}(`$col_name` VARCHAR($col_size) PRIMARY KEY);");
$result2 = mysqli_query($conn,"INSERT INTO {$_POST['tname']}(`$col_name`) VALUES ('{$_POST['a1']}')");
$result3 = mysqli_query($conn,"INSERT INTO {$_POST['tname']}(`$col_name`) VALUES ('{$_POST['a2']}')");
if(!empty($_POST['a3']))
{
    $result4 = mysqli_query($conn,"INSERT INTO {$_POST['tname']}(`$col_name`) VALUES ('{$_POST['a3']}')");
}
if(!empty($_POST['a4']))
{
    $result5 = mysqli_query($conn,"INSERT INTO {$_POST['tname']}(`$col_name`) VALUES ('{$_POST['a4']}')");
}
if(!empty($_POST['a5']))
{
    $result6 = mysqli_query($conn,"INSERT INTO {$_POST['tname']}(`$col_name`) VALUES ('{$_POST['a5']}')");
}

if ($result1)
{
    echo "New table created successfully";

}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
