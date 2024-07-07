<?php
include 'db_con.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
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
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM students WHERE Student_ID='$id'";
        $conn->query($sql);
        $sql = "DELETE FROM grade_level WHERE Student_ID='$id'";
        $conn->query($sql);
    }
}

$sql = "SELECT students.Student_ID as id, students.F_name as first_name, students.L_name as last_name, students.LRN as lrn, students.Section as section, students.Age as age, students.Gender as gender, students.Street as street, students.Lot as lot, students.Block as block, students.Baranggay as barangay, students.City as city, students.Zip_code as zip_code 
        FROM students 
        JOIN grade_level ON students.Student_ID = grade_level.Student_ID 
        WHERE grade_level.Year_level = 'nursery'";
$result = $conn->query($sql);
?>
