<?php
// Database connection
$host = 'localhost';
$user = 'root';      // Change if you have a different username
$pass = '';          // Add your MySQL password if set
$db = 'library';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the table
$sql = "SELECT * FROM book_records";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Book Records</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Library Book Records</h2>
    <table>
        <tr>
            <th>Book Library No</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Book Edition</th>
            <th>Price</th>
        </tr>
        
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['Book_Library_No'] ?></td>
                    <td><?= $row['Book_Name'] ?></td>
                    <td><?= $row['Author_Name'] ?></td>
                    <td><?= $row['Book_Edition'] ?></td>
                    <td><?= $row['Price'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No records found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
