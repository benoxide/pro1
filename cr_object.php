<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 10/16/2017
 * Time: 9:50 AM
 */
function load_table()
{
    $dbhost = getenv("MYSQL_SERVICE_HOST");
    //$servername = "localhost";
    $username = "user";
    $password = "password";
    $dbname = "temporary";

// Creating connection
    $conn = mysqli_connect($dbhost, $username, $password, $dbname);

// Checking connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $output = '';
    $sql = "SHOW TABLES FROM temporary";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result))
    {
        $output .= '<option value = "'.$row["Tables_in_temporary"].'">'.$row["Tables_in_temporary"].'</option>';
    }
    return $output;
}

?>
<!DOCTYPE html>
<html lang="en">
<link href="style1.css" rel = "stylesheet">
<script src = "jquery.js"></script>
<form method="POST" action="cr_obj.php">
    <tr> <td>Table Name</td><br><td> <input type="text" name="tname" required></td><br><br>

    <tr> <td><select name=" cname1">
                <option value=" ">Select a column </option>
                <?php echo load_table();?>
            </select> </td>
        <td><select name = "type1" >
                <option>Select one datatype</option>
                <option VALUE="INT">INT</option>
                <option VALUE="VARCHAR">VARCHAR</option>
            </select>
        </td>
        <br><td>Length</td><br><td> <input type="text" name="l1" required></td>
    </tr>
    <br><br>
    <tr> <td><select name=" cname2">
                <option value=" ">Select a column </option>
                <?php echo load_table();?>
            </select>

        </td>
        <td><select name="type2">
                <option>Select one datatype</option>
                <option VALUE="INT">INT</option>
                <option VALUE="VARCHAR">VARCHAR</option>
            </select>
        </td>
      <br>  <td>Length</td><br><td> <input type="text" name="l2" required></td>
    </tr>
    <br><br>

    <tr> <td><input id="button" type="submit" name="submit" value="Create"></td> </tr>
</form>




</html>
