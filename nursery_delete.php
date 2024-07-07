<?php
include 'db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];
    
    // Check if the student exists
    $check_stmt = $conn->prepare("SELECT * FROM students WHERE Student_ID = ?");
    if ($check_stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $check_stmt->bind_param("s", $id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
      
        $stmt = $conn->prepare("DELETE FROM grade_level WHERE Student_ID = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("s", $id);
        if (!$stmt->execute()) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }
        $stmt->close();

        $stmt = $conn->prepare("DELETE FROM students WHERE Student_ID = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("s", $id);
        if (!$stmt->execute()) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }
        $stmt->close();

        header("Location: nursery_students.php");
        exit();
    } else {
        echo "<h1>Student ID not found!</h1>";
    }

    $check_stmt->close();
}

$conn->close();
?>
