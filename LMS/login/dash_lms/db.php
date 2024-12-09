<?php
include 'db.php';

// Fetch courses from database
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["title"] . " - " . $row["status"] . "</li>";
    }
} else {
    echo "No courses found";
}

$conn->close();
?>