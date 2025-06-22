<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lead Form</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/optional.js"></script>
</head>
<body>
<nav>
    <a href="index.php">Form</a> |
    <a href="statuses.php">Statuses</a>
</nav>

<h2>Lead Form</h2>
<form method="post">
    <label>First Name: <input name="firstName" required></label><br>
    <label>Last Name: <input name="lastName" required></label><br>
    <label>Phone: <input name="phone" required></label><br>
    <label>Email: <input name="email" type="email" required></label><br>
    <button type="submit">Send</button>
</form>

<?php if ($response): ?>
    <p><strong>
            <?= $response['status'] ? "Success! ID: {$response['id']}, Email: {$response['email']}" : "Error: {$response['error']}" ?>
        </strong></p>
<?php endif; ?>
</body>
</html>
