<?php include '../includes/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student</title>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Page Title */
h1 {
    color: #4CAF50;
    margin: 20px 0;
}

/* Links */
a {
    text-decoration: none;
    color: #ffffff;
    background-color: #4CAF50;
    padding: 8px 12px;
    border-radius: 4px;
    margin: 5px;
}

a:hover {
    background-color: #45a049;
}

/* Table Styles */
table {
    border-collapse: collapse;
    width: 80%;
    margin: 20px 0;
    background-color: #ffffff;
}

table th, table td {
    border: 1px solid #ddd;
    text-align: left;
    padding: 8px;
}

table th {
    background-color: #4CAF50;
    color: white;
    text-align: center;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}

/* Form Styles */
form {
    background-color: #ffffff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 50%;
    margin-top: 20px;
}

form label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form button:hover {
    background-color: #45a049;
}

/* Center Content */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

    </style>

</head>
<body>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <h1>Edit Student</h1>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
        <label>Class:</label>
        <input type="text" name="class" value="<?php echo $row['class']; ?>" required>
        <label>Phone Number:</label>
        <input type="text" name="grade" value="<?php echo $row['grade']; ?>" required>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $class = $_POST['class'];
        $grade = $_POST['grade'];

        $sql = "UPDATE students SET name='$name', age='$age', class='$class', grade='$grade' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Student updated successfully!";
            header("Location: ../index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
