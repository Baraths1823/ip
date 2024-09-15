<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone=$_POST['phone'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO mytable(name, username,phone, password) VALUES (?, ?,?, ?)");
    $stmt->bind_param("ssss", $name, $username,$phone, $password);

    if ($stmt->execute()) {
        echo "The data has been saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>