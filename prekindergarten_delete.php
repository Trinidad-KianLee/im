<?php
include 'db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM students WHERE Student_ID='$id'";
    $conn->query($sql);

    $sql = "DELETE FROM grade_level WHERE Student_ID='$id'";
    $conn->query($sql);

    header("Location: prekindergarten_students.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Pre-Kindergarten Student - Mary Angel Learning Center</title>
    <link rel="stylesheet" href="./student.css">
</head>
<body>
    <div class="edit-container">
        <h2>Delete Student</h2>
        <form method="POST" action="prekindergarten_delete.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p>Are you sure you want to delete this student?</p>
            <button type="submit" name="delete">Delete Student</button>
        </form>
        <a href="prekindergarten_students.php" class="back-button">Back to Student List</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
