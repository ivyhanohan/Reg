<?php
$url = "https://jsonplaceholder.typicode.com/posts";
$response = file_get_contents($url);
$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts from API</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 2rem;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
        }

        .post {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .post h2 {
            font-size: 1.4rem;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .post p {
            color: #555;
            font-size: 1rem;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h1>Posts From API</h1>
    <?php foreach ($data as $post): ?>
        <div class="post">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
            <p><?= htmlspecialchars($post['body']) ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
