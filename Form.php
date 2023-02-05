<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script>
        var postCodeList = {
            <?php
                $host = "localhost";
                $user = "root";
                $pass = "";
                $database = "directlendingsocidia";
                $table = "postcode";
                $connection = mysqli_connect($host,$user,$pass);
                if ( mysqli_connect_errno() ) {
                    die( mysqli_connect_error() );
                }
                //createdb
                $create = "CREATE DATABASE IF NOT EXISTS $database";
                $connection->query($create);
                $connection = mysqli_connect($host,$user,$pass,$database);
                $getPostcodesList = "SELECT * FROM $table;";
                $result = $connection->query($getPostcodesList);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo($row["id"]." : \"".$row["state"]."\",\n");
                    }
                }
                ?>
        };
        function autoCapitalize(nameBox){
            if(nameBox.value.length==1){
                nameBox.value = nameBox.value.charAt(0).toUpperCase() + nameBox.value.slice(1);
            }else if(nameBox.value.charAt(nameBox.value.length-2)==" "){
                nameBox.value = nameBox.value.slice(0,nameBox.value.length-1)+nameBox.value.charAt(nameBox.value.length-1).toUpperCase();
            }
        }
        function isNumber(char) {
            return /^\d$/.test(char);
        }
        function findState(postCodeBox){
            if(!isNumber(postCodeBox.value.charAt(postCodeBox.value.length-1))){
                postCodeBox.value = postCodeBox.value.slice(0,postCodeBox.value.length-1)
            }
            var stateBox = document.getElementsByName("stateBox")[0];
            if(postCodeList[postCodeBox.value]!=null){
                stateBox.value = postCodeList[postCodeBox.value];
            }else{
                stateBox.value =null;
            }
        }
        function validation(){
            var stateBox = document.getElementsByName("stateBox")[0];
            if(stateBox.value!=""){
                document.getElementById("theForm").submit();
                return true;
            }else if(stateBox.value==""){
                alert("State not found or invalid postcode!")
                return false;
            }
            return false;
        }
    </script>
</head>
<body>
    
    <form id="theForm" method="POST" action="Post.php" onsubmit="return validation()">
        <table>
            <tr>
                <td><label>Name</label></td>
                <td> : </td>
                <td><input type="text"name="theName" oninput="autoCapitalize(this)" required></td>
            </tr>
            <tr>
                <td><label>Date of Birth</label></td>
                <td> : </td>
                <td><input type="date" name="bod"required></td>
            </tr>
            <tr>
                <td><label>Address</label></td>
                <td> : </td>
                <td><textarea rows="2" name ="address" required></textarea></td>
            </tr>
            <tr>
                <td><label>Postcode</label></td>
                <td> : </td>
                <td><input type="text" name="postcode" maxlength="5" oninput="findState(this)"required></td>
            </tr>
            <tr>
                <td><label>State</label></td>
                <td> : </td>
                <td><input type="text" name="stateBox" disabled required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit"></td>
            </tr>
        </table>
        <script>
            var bodInput = document.getElementsByName("bod")[0];
            bodInput.max = new Date().toISOString().split("T")[0];
        </script>
    </form>
</body>
</html>