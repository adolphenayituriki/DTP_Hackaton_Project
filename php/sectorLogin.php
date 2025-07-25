<?php
session_start();

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "umuganda";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$full_name = $_POST['full_name'];
$district = $_POST['district'];
$sector = $_POST['sector'];
$password = $_POST['password'];

// Query to check login
$sql = "SELECT * FROM sector_credential WHERE full_name=? AND district=? AND sector=? AND password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $district, $sector, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Save session variables if needed
    $_SESSION['full_name'] = $full_name;
    $_SESSION['district'] = $district;
    $_SESSION['sector'] = $sector;

    // Redirect to dashboard
    header("Location: /DTP_Hackton_Project/html/ManageFiles.html");
    exit();
} else {
    // Redirect back with error
    header("Location: /DTP_Hackton_Project/html/login.php?error=1");
    exit();
}

$conn->close();
?>
