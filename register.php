<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "lab_7"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$matric = $_POST['matric'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
$role = $_POST['role'];


$stmt = $conn->prepare("INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $matric, $name, $password, $role);


if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>