<?php
include 'db_con.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (md5($password) == $admin['password']) { 
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<h1>Invalid credentials!</h1>";
        }
    } else {
        echo "<h1>Invalid credentials!</h1>";
    }
}
?>
