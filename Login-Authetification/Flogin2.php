<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $pass = $_POST['pass'];


    $host ="localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "log-auth";

    $conn = new mysqli($host, $dbusername,$dbpassword,$dbname);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);

    }

    $query = "SELECT *FROM info WHERE username='$username' AND pass='$pass'";

    $result = $conn->query($query);

    if($result->num_rows == 1){
        header("Location: index.html ");
        exit();
    }
    else{
        header("Location: Fnotdone.html ");
        exit();
    }

    $conn->close();


}


?>