<html>
<head>
    <title>Testing Options</title>
	
</head>
<script src = "jquery.min.js"></script>
<link href="style1.css" rel = "stylesheet">

<body>

    
	 <tr> <td>click here for testing</td> </tr> 
    <input type="submit" value="Get Result" onclick="getVal1();">
</form>

</body>
</html>
<script>
    function getVal() {

        $.ajax({
                type:"POST",
                url: "api_decision.php",
                data : {
                    sub_id : 4
					obj_id : 1
					operation = "read"
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