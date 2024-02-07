<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonNumber = $_POST['phoneNumber'];
    $pass = $_POST['pass'];
    $confirmPassword = $_POST['confirmPassword'];

    $conn = new mysqli('localhost', 'root', '', 'log-auth');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO info (fullName,username,email,phoneNumber,pass,confirmPassword) VALUES (?, ?,?,?,?,?)");
        $stmt->bind_param("ssssss", $fullname, $username,$email,$phonNumber,$pass,$confirmPassword  );

        if ($stmt->execute()) {
            echo '<script>alert("Registration successful");</script>';
           // echo "Registration successful";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
