<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /DTP_Hackaton_Project/html/AdminLogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-5">
    <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    <p><strong>District:</strong> <?php echo $_SESSION['district']; ?></p>
    <p><strong>Sector:</strong> <?php echo $_SESSION['sector']; ?></p>
    <a href="/DTP_Hackaton_Project/php/logout.php" class="btn btn-danger">Logout</a>
</body>
</html>
