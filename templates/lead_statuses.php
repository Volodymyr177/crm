<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lead Statuses</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/optional.js" defer></script>
</head>
<body>
<nav>
    <a href="index.php">Form</a> |
    <a href="statuses.php">Statuses</a>
</nav>

<h2>Lead Statuses</h2>
<form method="post">
    <label>From: <input type="datetime-local" name="date_from" required></label><br>
    <label>To: <input type="datetime-local" name="date_to" required></label><br>
    <button type="submit">Load</button>
</form>

<?php if (!empty($rows)): ?>
    <p>Знайдено: <?= count($rows) ?></p>
    <table border="1" cellpadding="5">
        <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Status</th>
            <th>FTD</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $i => $row): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= $row['status'] ?: 'new' ?></td>
                <td><?= $row['ftd'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <p>Немає даних.</p>
<?php endif; ?>
</body>
</html>
<?php
