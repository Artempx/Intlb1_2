<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manufacturer = $_POST['manufacturer'];

    $stmt = $pdo->prepare("SELECT cars.* FROM cars 
        JOIN vendors ON cars.FID_Vendors = vendors.ID_Vendors 
        WHERE vendors.Name = ?");
    $stmt->execute([$manufacturer]);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Автомобілі $manufacturer:</h2>";
    foreach ($cars as $car) {
        echo "<p>{$car['Name']} ({$car['Release_date']}) - Стан: {$car['State(new,old)']}</p>";
    }
}
?>
<a href="index.php">Назад</a>
