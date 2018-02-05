<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 10/14/2017
 * Time: 10:26 AM

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
$type1 = $_POST['type1'];
$type2 = $_POST['type2'];
$type3 = $_POST['type3'];
$col_size1 = $_POST['l1'];
$col_size2 = $_POST['l2'];
$col_size3 = $_POST['l3'];

$result1 = mysqli_query($conn, "CREATE TABLE {$_POST['tname']}(`id` INT(10) PRIMARY KEY NOT NULL ,
`$col_name1` $type1($col_size1) NOT NULL,`$col_name2` $type2($col_size2) NOT NULL,`$col_name3` $type1($col_size3) NOT NULL);");