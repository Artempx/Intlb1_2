<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];

    
    $stmt = $pdo->prepare("SELECT SUM(cost) AS total_income FROM rent WHERE date_start <= :date");
    
    
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    
    
    $stmt->execute();
    
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<h2>Дохід на $date: " . ($result['total_income'] ?? 0) . " грн</h2>";
}
?>
<a href="index.php">Назад</a>
