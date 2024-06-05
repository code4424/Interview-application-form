<?php
$servername = "localhost5000";
$username = "root";
$password = ""; // Add your MySQL password
$dbname = "job_application";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $work_experience = $_POST['work_experience'];
    $job_type = $_POST['job_type'];
    $cover_letter = $_POST['cover_letter'];
    $terms_accepted = isset($_POST['terms']) ? 1 : 0;

    // Handle file upload
    $resume = "";
    if (isset($_FILES['upload-file']) && $_FILES['upload-file']['error'] == 0) {
        $target_dir = "uploads/";
        $resume = $target_dir . basename($_FILES["upload-file"]["name"]);
        move_uploaded_file($_FILES["upload-file"]["tmp_name"], $resume);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO applications (name, email, phone, gender, position, work_experience, job_type, cover_letter, resume, terms_accepted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssi", $name, $email, $phone, $gender, $position, $work_experience, $job_type, $cover_letter, $resume, $terms_accepted);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: job-complete.html"); // Redirect to a thank you page
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
