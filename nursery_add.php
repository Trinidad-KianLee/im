<?php
include 'db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $lrn = $_POST['lrn'];
    $section = $_POST['section'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $street = $_POST['street'];
    $lot = $_POST['lot'];
    $block = $_POST['block'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $zip_code = $_POST['zip_code'];

    $check_stmt = $conn->prepare("SELECT * FROM students WHERE Student_ID = ?");
    $check_stmt->bind_param("s", $student_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO students (Student_ID, F_name, L_name, LRN, Section, Age, Gender, Street, Lot, Block, Baranggay, City, Zip_code) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissississs", $student_id, $first_name, $last_name, $lrn, $section, $age, $gender, $street, $lot, $block, $barangay, $city, $zip_code);

        if ($stmt->execute()) {
            $stmt = $conn->prepare("INSERT INTO grade_level (Student_ID, Year_level) VALUES (?, 'nursery')");
            $stmt->bind_param("s", $student_id);

            if ($stmt->execute()) {
                header("Location: nursery_students.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<h1>Student ID already exists!</h1>";
    }

    $check_stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Nursery Student - Mary Angel Learning Center</title>
    <link rel="stylesheet" href="./student.css">
</head>
<body>
    <div class="edit-container">
        <h2>Add Student</h2>
        <form method="POST" action="nursery_add.php">
            <input type="text" name="student_id" placeholder="Student ID" required>
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="text" name="lrn" placeholder="LRN" required>
            <input type="text" name="section" placeholder="Section" required>
            <input type="text" name="age" placeholder="Age" required>
            <input type="text" name="gender" placeholder="Gender" required>
            <input type="text" name="street" placeholder="Street" required>
            <input type="text" name="lot" placeholder="Lot" required>
            <input type="text" name="block" placeholder="Block" required>
            <input type="text" name="barangay" placeholder="Barangay" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="zip_code" placeholder="Zip Code" required>
            <button type="submit" name="create">Add Student</button>
        </form>
        <a href="nursery_students.php" class="back-button">Back to Student List</a>
    </div>
</body>
</html>
