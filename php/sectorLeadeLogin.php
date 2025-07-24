<?php
// php/sectorLeaderLogin.php
session_start();
if (password_verify($password, $user['password'])) {
    // Successful login
    $_SESSION['leader_id'] = $user['id'];
    $_SESSION['leader_name'] = $user['full_name'];

    // Redirect to dashboard
    header("Location: /LocalLeaderLogin.html"); 
    exit;
}
header("Location: /umuganda_system/dashboard.html");
header("Location: LocalLeaderLogin.html");


// Database connection
$host = 'localhost';
$db   = 'umuganda_system';
$user = 'root'; // change if needed
$pass = '';     // your DB password
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and get input
$full_name = trim($_POST['full_name']);
$district = trim($_POST['district']);
$sector = trim($_POST['sector']);
$password = $_POST['password']; // Don't trim password

// Query to check if user exists
$sql = "SELECT * FROM sector_leaders WHERE full_name=? AND district=? AND sector=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $full_name, $district, $sector);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if (password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['leader_id'] = $user['id'];
        $_SESSION['leader_name'] = $user['full_name'];
        header("Location: /dashboard.html"); // Redirect to admin dashboard
        exit;
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ Leader not found.";
}


$conn->close();
?>

