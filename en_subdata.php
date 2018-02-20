<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 10/17/2017
 * Time: 9:32 AM
 */
function load_columns()
{
    $servername = getenv("MYSQL_SERVICE_HOST");
    //$servername = "localhost";
    $username = "user";
    $password = "password";
    $dbname = "temporary";

// Creating connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $output = '';
    $sql = "SHOW COLUMNS FROM sub1";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result))
    {
        $output .= '<option value = "'.$row["Field"].'">'.$row["Field"].'</option>';
    }
    return $output;
}
?>
<!DOCTYPE html>
<html lang="en">
<link href="style1.css" rel = "stylesheet">
<script src = "jquery.min.js"></script>
<form method="POST" action="enter_sub_data.php">

    <select name="cname1" onchange="getVal(this.value);">
                <option value="">Select a column name</option>
                <?php echo load_columns();?>
            </select>
     <select name=" val1" id = "val1">
                <option value="">Select a value </option>
            </select>

    <br><br>
    <select name="cname2" onchange="getVal1(this.value);">
            <option value="">Select a column name</option>
            <?php echo load_columns();?>
        </select>
    <select name=" val2" id = "val2">
        <option value="">Select a value </option>
    </select>

    <br><br>
<select name="cname3" onchange="getVal2(this.value);">
    <option value="">Select a column name</option>
    <?php echo load_columns();?>
</select>
<select name=" val3" id = "val3">
    <option value="">Select a value </option>
</select>

<br><br>

    <input id="button" type="submit" name="submit" value="Create" >
</form>
</html>
<script>
    function getVal(val) {

        $.ajax({
            type:"POST",
            url: "fetch_val.php",
            data : {
                cid : val
            },
            success:function (data) {
                $('#val1').html(data);
                //alert("success");
                //console.log(data);

            },


        }
        )

    };

</script>
<script>
    function getVal1(val) {

        $.ajax({
                type:"POST",
                url: "fetch_val.php",
                data : {
                    cid : val
                },
                success:function (data) {
                    $('#val2').html(data);
                    //alert("success");
                    //console.log(data);

                },


            }
        )

    };

</script>
<script>
    function getVal2(val) {

        $.ajax({
                type:"POST",
                url: "fetch_val.php",
                data : {
                    cid : val
                },
                success:function (data) {
                    $('#val3').html(data);
                    //alert("success");
                    //console.log(data);

                },


            }
        )

    };

</script>
