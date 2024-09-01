<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $Email = $_POST['Email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'crud_app');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert item
    $sql = "INSERT INTO items (name, description ,Email) VALUES ('$name', '$description' ,'$Email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: user 1.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center><h1>Add New Item</h1>
    <form method="post" action="">
    <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="Email">Email:</label>
        <input type="text" id= "Email" name="Email" required> <br><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <br><br>  
       <input type="submit" value="Add Item">
    </form>
    <a href="user 1.php"></a></center>   
</body>
</html>
