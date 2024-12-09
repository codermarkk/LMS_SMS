<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "1234";
$database = "my_database";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $conn->real_escape_string(trim($_POST['student-id']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $firstName = $conn->real_escape_string(trim($_POST['first-name']));
    $middleName = $conn->real_escape_string(trim($_POST['middle-name']));
    $lastName = $conn->real_escape_string(trim($_POST['last-name']));
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

    // Check if student_id or email already exists
    $checkQuery = "SELECT * FROM users WHERE student_id = ? OR email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $studentId, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Student ID or Email is already registered.";
        exit;
    }
    $stmt->close();

    // Insert into the database
    $insertQuery = "INSERT INTO users (student_id, email, first_name, middle_name, last_name, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssss", $studentId, $email, $firstName, $middleName, $lastName, $password);

    if ($stmt->execute()) {
        echo "Account created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>