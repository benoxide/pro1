<?php
/**
 * Created by PhpStorm.
 * User: Augustee
 * Date: 11/11/2017
 * Time: 3:23 PM
 */
function load_objectid()
{
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
    $sql = "SELECT id FROM `obj1` ";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result))
    {
        $output .= '<option value = "'.$row["id"].'">'.$row["id"].'</option>';
    }
    return $output;
}
function load_columns()
{
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
    $sql = "SHOW COLUMNS FROM sub1";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result))
    {
        $output .= '<option value = "'.$row["Field"].'">'.$row["Field"].'</option>';
    }
    return $output;
}
?>
<html>
<script src = "jquery.min.js"></script>
<link href="style2.css" rel = "stylesheet">
<body id="body-color">
<div id="Sign-Up">
    <fieldset style="width:35%"><legend>Enter Rules</legend>
        <table border="0">
            <form method="POST" action="set_rules.php">
                <tr> <td>Rule Id</td><td> <input type="text" name="ruleid" required></td></tr>
                <tr> <td>Operation</td><td> <input type="text" name="ops" required></td></tr>
                <tr><td><select name="objid" >
                            <option value="">Select an object_id</option>
                            <?php echo load_objectid();?>
                        </select></td></tr>
				<tr> <td>Link</td><td> <input type="text" name="links" required></td></tr>
                <tr><td>Enter Subject Attributes</td></tr>
                <tr><td><select name="cname1" onchange="getVal(this.value);">
                    <option value="">Select a column name</option>
                    <?php echo load_columns();?>
                        </select></td>
                <td><select name=" val1" id = "val1">
                    <option value="">Select a value </option>
                    </select></td></tr>
                <tr><td><select name="cname2" onchange="getVal1(this.value);">
                            <option value="">Select a column name</option>
                            <?php echo load_columns();?>
                        </select></td>
                    <td><select name=" val2" id = "val2">
                            <option value="">Select a value </option>
                        </select></td></tr>

				



                <tr><td><select name="cname3" onchange="getVal2(this.value);">
                    <option value="">Select a column name</option>
                    <?php echo load_columns();?>
                        </select></td>
                <td><select name=" val3" id = "val3">
                    <option value="">Select a value </option>
                    </select></td></tr>



                <tr> <td><input id="button" type="submit" name="submit" value="Create"></td> </tr> </form> </table> </fieldset> </div>

</body>
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
