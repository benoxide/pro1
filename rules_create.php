<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 11/6/2017
 * Time: 2:38 PM
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
