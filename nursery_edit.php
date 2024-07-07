<?php
include 'db_con.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE Student_ID='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No student found with the given ID.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
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

    $sql = "UPDATE students SET F_name='$first_name', L_name='$last_name', LRN='$lrn', Section='$section', Age='$age', Gender='$gender', Street='$street', Lot='$lot', Block='$block', Baranggay='$barangay', City='$city', Zip_code='$zip_code' WHERE Student_ID='$id'";
    $conn->query($sql);

    header("Location: nursery_students.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nursery Student - Mary Angel Learning Center</title>
    <link rel="stylesheet" href="./student.css">
</head>
<body>
    <div class="edit-container">
        <h2>Edit Student</h2>
        <form method="POST" action="nursery_edit.php">
            <input type="hidden" name="id" value="<?php echo $row['Student_ID']; ?>">
            <input type="text" name="first_name" value="<?php echo $row['F_name']; ?>" placeholder="First Name" required>
            <input type="text" name="last_name" value="<?php echo $row['L_name']; ?>" placeholder="Last Name" required>
            <input type="text" name="lrn" value="<?php echo $row['LRN']; ?>" placeholder="LRN" required>
            <input type="text" name="section" value="<?php echo $row['Section']; ?>" placeholder="Section" required>
            <input type="text" name="age" value="<?php echo $row['Age']; ?>" placeholder="Age" required>
            <input type="text" name="gender" value="<?php echo $row['Gender']; ?>" placeholder="Gender" required>
            <input type="text" name="street" value="<?php echo $row['Street']; ?>" placeholder="Street" required>
            <input type="text" name="lot" value="<?php echo $row['Lot']; ?>" placeholder="Lot" required>
            <input type="text" name="block" value="<?php echo $row['Block']; ?>" placeholder="Block" required>
            <input type="text" name="barangay" value="<?php echo $row['Baranggay']; ?>" placeholder="Barangay" required>
            <input type="text" name="city" value="<?php echo $row['City']; ?>" placeholder="City" required>
            <input type="text" name="zip_code" value="<?php echo $row['Zip_code']; ?>" placeholder="Zip Code" required>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
