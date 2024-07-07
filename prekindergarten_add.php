<?php
include 'db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
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

    $sql = "INSERT INTO students (F_name, L_name, LRN, Section, Age, Gender, Street, Lot, Block, Baranggay, City, Zip_code) 
            VALUES ('$first_name', '$last_name', '$lrn', '$section', '$age', '$gender', '$street', '$lot', '$block', '$barangay', '$city', '$zip_code')";
    if ($conn->query($sql) === TRUE) {
        $student_id = $conn->insert_id;
        $sql = "INSERT INTO grade_level (Student_ID, Year_level) VALUES ('$student_id', 'pre-kindergarten')";
        if ($conn->query($sql) === TRUE) {
            header("Location: prekindergarten_students.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pre-Kindergarten Student - Mary Angel Learning Center</title>
    <link rel="stylesheet" href="./student.css">
</head>
<body>
    <div class="edit-container">
        <h2>Add Student</h2>
        <form method="POST" action="prekindergarten_add.php">
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
        <a href="prekindergarten_students.php" class="back-button">Back to Student List</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
