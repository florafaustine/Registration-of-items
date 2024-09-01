<?php
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'crud_app');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update item
    $sql = "UPDATE items SET name='$name', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: user 1.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Retrieve the item to be updated
$conn = new mysqli('localhost', 'root', '', 'crud_app');
$sql = "SELECT * FROM items WHERE id=$id";
$result = $conn->query($sql);
$item = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center><h1>Update Item</h1>
    <form method="post" action="">
    <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
        <br> <br>
        <label for="name">Email:</label>
        <input type="text" id="Email" name="Email" value="<?php echo htmlspecialchars($item['Email']); ?>" required>
        <br> <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
        <br> <br>
        <input type="submit" value="Update Item" >
    </form> <br>
    <a href="user 1.php">Back to List</a></center>
</body>
</html>
