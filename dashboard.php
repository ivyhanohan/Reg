<?php 
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}


require_once 'db.php'; 

$search = '';
$results = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = trim($_GET['search']);

    $sql = "SELECT * FROM users WHERE username LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$search%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $query = $stmt->get_result();

    if ($query && $query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body class="grey lighten-4">

    <div class="container center-align" style="margin-top: 50px;">
        <div class="card-panel teal lighten-4">
            <h5>Welcome, <?= htmlspecialchars($_SESSION["username"]); ?>!</h5>
            <p>You are logged in.</p>
            <a href="logout.php" class="btn red">Logout</a>
        </div>

        <div class="card-panel">
            <h5>Search Users</h5>
            <form method="get" action="">
                <div class="input-field">
                    <input id="search" type="text" name="search" value="<?= htmlspecialchars($search) ?>">
                    <label for="search">Enter username</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit">Search</button>
            </form>

            <div class="section">
                <h6>Results:</h6>
                <?php if (count($results) > 0): ?>
                    <ul class="collection">
                        <?php foreach ($results as $person): ?>
                            <li class="collection-item"><?= htmlspecialchars($person['username']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php elseif ($search): ?>
                    <p>No results found for <strong><?= htmlspecialchars($search) ?></strong></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
