<?php
include 'db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM students WHERE Student_ID='$id'";
    $conn->query($sql);
    $sql = "DELETE FROM grade_level WHERE Student_ID='$id'";
    $conn->query($sql);

    header("Location: nursery_students.php");
    exit();
}
?>
