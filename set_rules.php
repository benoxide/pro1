<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 11/11/2017
 * Time: 6:16 PM
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
$col_name1 = $_POST['ruleid'];
$col_name2 = $_POST['ops'];
$col_name3 = $_POST['objid'];
$col_name10 = $_POST['links'];
$sql = "INSERT INTO `rule_obj`(`rule_id`, `operation`, `objectid`,`link`) VALUES ('$col_name1','$col_name2',$col_name3,'$col_name10')";
$col_name4 = $_POST['cname1'];
$col_name5 = $_POST['cname2'];
$col_name6 = $_POST['cname3'];
$col_value1 = $_POST['val1'];
$col_value2 = $_POST['val2'];
$col_value3 = $_POST['val3'];
$sql1 = "INSERT INTO `rule_sub`(`rule_id`,`$col_name4`, `$col_name5`, `$col_name6`) VALUES ('$col_name1',$col_value1,'$col_value2','$col_value3')";
$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);
if($result1 && $result)
{
    Redirect("index.html");
}
else
{
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}