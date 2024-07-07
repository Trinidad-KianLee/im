<?php
include 'db_con.php';

$sql = "SELECT * FROM parents";
$result = $conn->query($sql);

if ($result === false) {
    die("Error: " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents List</title>
    <link rel="stylesheet" href="./student.css">
</head>
<body>
    <div class="container">
        <h1>Parents List</h1>
        <a href="./nursery_students.php" class="back-button">Back to Year Level Selection</a>
        <table>
            <thead>
                <tr>
                    <th>Parent ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Student ID</th>
                    <th>Contact Number</th>
                    <th>Street</th>
                    <th>Lot</th>
                    <th>Block</th>
                    <th>Barangay</th>
                    <th>City</th>
                    <th>Zip Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Parents_ID'] . "</td>";
                    echo "<td>" . $row['F_name'] . "</td>";
                    echo "<td>" . $row['L_name'] . "</td>";
                    echo "<td>" . $row['Student_ID'] . "</td>";
                    echo "<td>" . $row['Contact_num'] . "</td>";
                    echo "<td>" . $row['Street'] . "</td>";
                    echo "<td>" . $row['Lot'] . "</td>";
                    echo "<td>" . $row['Block'] . "</td>";
                    echo "<td>" . $row['Baranggay'] . "</td>";
                    echo "<td>" . $row['City'] . "</td>";
                    echo "<td>" . $row['Zip_code'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
