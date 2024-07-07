<?php
include 'db_con.php';

$level = 'kindergarten';

$sql = "SELECT students.Student_ID as id, students.F_name as first_name, students.L_name as last_name, students.LRN as lrn, students.Section as section, students.Age as age, students.Gender as gender, students.Street as street, students.Lot as lot, students.Block as block, students.Baranggay as barangay, students.City as city, students.Zip_code as zip_code, grade_level.Year_level as year_level 
        FROM students 
        JOIN grade_level ON students.Student_ID = grade_level.Student_ID 
        WHERE grade_level.Year_level = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("MySQL prepare statement failed: " . $conn->error);
}

$stmt->bind_param("s", $level);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kindergarten Students - Mary Angel Learning Center</title>
    <link rel="stylesheet" href="./student.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Students - Kindergarten</h1>
        <a href="view_students.php" class="back-button">Back to Year Level Selection</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>LRN</th>
                    <th>Section</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Street</th>
                    <th>Lot</th>
                    <th>Block</th>
                    <th>Barangay</th>
                    <th>City</th>
                    <th>Zip Code</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['lrn']; ?></td>
                        <td><?php echo $row['section']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['street']; ?></td>
                        <td><?php echo $row['lot']; ?></td>
                        <td><?php echo $row['block']; ?></td>
                        <td><?php echo $row['barangay']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['zip_code']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
