<?php
$hasError = isset($_GET['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sector Leader Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to right, #2c3e50, #3498db);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }
        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .btn-custom {
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: white;
            border-radius: 8px;
            border: none;
        }
        .btn-custom:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
<div class="login-card">
    <h2>Sector Leader Login</h2>
    <?php if ($hasError): ?>
        <div class="alert alert-danger">Invalid credentials. Please try again.</div>
    <?php endif; ?>
    <form action="/DTP_Hackaton_Project/php/sectorLogin.php" method="post">
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Names</label>
            <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Enter your names" required />
        </div>
        <div class="mb-3">
            <label for="district" class="form-label">District</label>
            <select name="district" id="district" class="form-select" required>
                <option value="" disabled selected>Select your district</option>
                <option value="Burera">BURERA</option>
                <option value="Musanze">MUSANZE</option>
                <option value="Gicumbi">GICUMBI</option>
                <option value="Gasabo">GASABO</option>
                <!-- Add others -->
            </select>
        </div>
        <div class="mb-3">
            <label for="sector" class="form-label">Sector</label>
            <input type="text" id="sector" name="sector" class="form-control" placeholder="Your sector" required />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Write your password" required />
        </div>
        <button type="submit" class="btn-custom">Login</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/Admin'sLogin.js"></script>
</body>
</html>
