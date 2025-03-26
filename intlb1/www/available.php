<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];

    $stmt = $pdo->prepare("SELECT * FROM cars 
        WHERE ID_cars NOT IN (
            SELECT FID_Car FROM rent 
            WHERE ? BETWEEN Date_start AND Date_end
        )");
    $stmt->execute([$date]);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Вільні авто на $date:</h2>";
    if (count($cars) > 0) {
        foreach ($cars as $car) {
            echo "<p>{$car['Name']} ({$car['Release_date']}) - Стан: {$car['State(new,old)']}</p>";
        }
    } else {
        echo "<p>Немає вільних авто.</p>";
    }
}
?>
<a href="index.php">Назад</a>
