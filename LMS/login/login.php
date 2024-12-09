<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "my_database";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Database connection error. Please try again later.");
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    session_regenerate_id(true);

    $studentId = $conn->real_escape_string(trim($_POST['student-id']));
    $password = trim($_POST['password']);

    // Fetch user data based on student_id
    $query = "SELECT * FROM users WHERE student_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['student_id'] = $user['student_id'];
            $_SESSION['first_name'] = $user['first_name'];

            // Redirect to dashboard or welcome page
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Account not found.";
    }
    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>