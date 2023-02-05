<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading</title>
</head>
<body>
    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $database = "directlendingsocidia";
        $table = "customer";
        $connection = mysqli_connect($host,$user,$pass);
        if ( mysqli_connect_errno() ) {
            die( mysqli_connect_error() );
        }
        //createdb
        $create = "CREATE DATABASE IF NOT EXISTS $database";
        $connection->query($create);
        $connection = mysqli_connect($host,$user,$pass,$database);
        $name = $_POST["theName"];
        $bod = $_POST["bod"];
        $address = $_POST["address"];
        $postcode = $_POST["postcode"];
        $state = $_POST["stateBox"];
        $insert = "INSERT INTO `$table` (`name`, `dob`,`address`,`postcode_id`) VALUES ('$name','$bod','$address','$postcode');";
        if ($connection->query($insert) === TRUE) {
            echo("<script>alert('Success Register!');window.location.href = 'Form.php'</script>");
        }else{
            echo("<script>alert('Register Failed!');window.location.href = 'Form.php'</script>");
        }
    ?>
</body>
</html>