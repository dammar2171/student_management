<?php include 'includes/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="style.css">
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
    <h1>Student Management System</h1>
    <a href="students/create.php">Add New Student</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Class</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['class']}</td>
                        <td>{$row['grade']}</td>
                        <td>
                            <a href='students/edit.php?id={$row['id']}'>Edit</a> |
                            <a href='students/delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
