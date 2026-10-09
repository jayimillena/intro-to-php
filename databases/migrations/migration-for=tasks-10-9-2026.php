<?php 

include '../../config/connection.php'; // Ensures $conn is defined

$statement = "
    CREATE TABLE tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(55) NOT NULL,
        description TEXT,
        is_completed BOOLEAN DEFAULT false
    );";

// Use mysqli_query() passing the connection variable and the SQL string
$exec = mysqli_query($conn, $statement); 

if ($exec) {
    echo "Table created successfully!";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}