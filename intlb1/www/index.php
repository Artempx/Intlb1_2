<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Автопрокат</title>
</head>
<body>
    <h2>Отриманий дохід</h2>
    <form action="income.php" method="POST">
        <label>Виберіть дату:</label>
        <input type="date" name="date" required>
        <button type="submit">Показати</button>
    </form>

    <h2>Автомобілі виробника</h2>
    <form action="cars.php" method="POST">
        <label>Виберіть виробника:</label>
        <select name="manufacturer" required>
            <?php
            require 'db.php';
            $stmt = $pdo->query("SELECT name FROM vendors");
            while ($vendor = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$vendor['name']}'>{$vendor['name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Показати</button>
    </form>

    <h2>Вільні автомобілі</h2>
    <form action="available.php" method="POST">
        <label>Виберіть дату:</label>
        <input type="date" name="date" required>
        <button type="submit">Показати</button>
    </form>
</body>
</html>
