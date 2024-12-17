<?php
$conn = new mysqli('localhost', 'root', '', 'countries_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$country = $_GET['country'];
$sql = "SELECT * FROM countries WHERE name LIKE '%$country%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'population' => $row['population'],
        'capital' => $row['capital']
    ]);
} else {
    echo json_encode(null);
}

$conn->close();
?>
