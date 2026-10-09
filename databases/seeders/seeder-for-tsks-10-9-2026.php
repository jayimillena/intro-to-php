<?php

include '../../config/connection.php'; // Ensures $conn is defined

$data_sets = [
    [
        'name' => 'Maghugas ng pingan',
        'description' => 'Dapat malinis iyong plato, walang sabon, walang tagiptip',
        'is_completed' => false
    ],
    [
        'name' => 'Mag grind',
        'description' => 'Tuwing alas dose ng gabi',
        'is_completed' => true
    ],
    [
        'name' => 'Mag toothbrush',
        'description' => 'Tuwing umaga at gabi ng gamit ay asin',
        'is_completed' => true
    ],
    [
        'name' => 'Matulog ng maaga',
        'description' => 'Ng dalawang oras lang',
        'is_completed' => true
    ],
];

foreach ($data_sets as $key =>$data_set) {
    // Escape values to prevent SQL injection and broken queries
    $name = mysqli_real_escape_string($conn, $data_set['name']);$description = mysqli_real_escape_string($conn,$data_set['description']);
    $is_completed = (int)$data_set['is_completed']; // cast boolean/integer

    $query = "INSERT INTO tasks (`name`, `description`, `is_completed`) 
              VALUES ('$name', '$description',$is_completed)";

    $saved = mysqli_query($conn,$query);

    if ($saved) {
        echo "Successfully<br>";
    } else {
        echo "Failed: " . mysqli_error($conn) . "<br>";
    }
}
?>