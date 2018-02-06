<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 10/14/2017
 * Time: 10:26 AM

 */
$dbhost = getenv("MYSQL_SERVICE_HOST");
//$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "temporary";

// Creating connection
$conn = mysqli_connect($dbhost, $username, $password, $dbname);

// Checking connection
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$col_name1 = $_POST['cname1'];
$col_name2 = $_POST['cname2'];

$type1 = $_POST['type1'];
$type2 = $_POST['type2'];

$col_size1 = $_POST['l1'];
$col_size2 = $_POST['l2'];


$result1 = mysqli_query($conn, "CREATE TABLE {$_POST['tname']}(`id` INT(10) PRIMARY KEY NOT NULL ,
`$col_name1` $type1($col_size1) NOT NULL,`$col_name2` $type2($col_size2) NOT NULL);");
