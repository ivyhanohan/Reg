<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="d-flex">
            <span class="navbar-text text-white me-3">
                Logged in as: <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong>
            </span>
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Welcome Admin!</h2>
        <p>This is your dashboard where you can manage users, view reports, or monitor system activity.</p>

        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="#" class="btn btn-primary w-100">Manage Users</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="#" class="btn btn-secondary w-100">View Reports</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="#" class="btn btn-info w-100">System Logs</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
