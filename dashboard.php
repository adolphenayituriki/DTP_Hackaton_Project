<?php
session_start();
if (!isset($_SESSION['leader_id'])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['leader_name']); ?>!</h1>
    <p>This is your dashboard.</p>
    <a href="php/logout.php">Logout</a>
</body>
</html>
