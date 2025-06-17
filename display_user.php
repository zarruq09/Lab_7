<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "lab_7"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>
    <h2>User List</h2>
    <table>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Role</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".htmlspecialchars($row["matric"])."</td>
                        <td>".htmlspecialchars($row["name"])."</td>
                        <td>".htmlspecialchars($row["role"])."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>