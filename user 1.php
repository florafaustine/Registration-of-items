<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all items
$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <center> <h1>Items List</h1>
    <a href="add.php">Add New Item</a></center>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                  <button> <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> </button> 
                 <button> <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?'); ">Delete</a></button>  
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
