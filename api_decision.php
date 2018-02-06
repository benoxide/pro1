<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 9/12/2017
 * Time: 9:56 AM
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
$sql = "SELECT * FROM `rule_sub` where `rule_sub`.empid = {$_POST['sub_id']} AND `rule_sub`.`rule_id` IN
		(SELECT `rule_obj`.`rule_id` FROM `rule_obj` WHERE `rule_obj`.`objectid` = {$_POST['obj_id']} AND `rule_obj`.`operation` = '{$_POST['operation']}')";


$result = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM `sub1` WHERE empid = {$_POST['sub_id']} ";

$result1 = mysqli_query($conn, $sql1);

$sql2 = "SHOW COLUMNS FROM `sub1` ";

$result3 = mysqli_query($conn, $sql2);

$rules = mysqli_num_rows($result);

if ($rules > 0) {
    // output data of each row
	$Flag = True;
	$r_count = mysqli_num_rows($result);
    while($row1 = mysqli_fetch_assoc($result)) {
		$row2 = mysqli_fetch_assoc($result1);
	while($row = mysqli_fetch_assoc($result3))
	{
		
		$temp = $row["Field"];
		$tempv1 = $row1[$temp];
		$tempv2 = $row2[$temp];
		if($tempv1 == $tempv2){
			$Flag = True;
		}
		else
		{
			$Flag = False;
		}
		
			
	}
	if($Flag == True)
	{
		echo "access granted";
		break;
	}
	else
	{
		$r_count = $r_count-1;
    }
	}
	if($r_count == 0 and $Flag == False)
	{
		echo "acess not granted";
	}
	
} 
else {
	echo "0 results";
	}



