<?php

try {
    $pdo = new PDO('sqlite:database/database.sqlite');
    $stmt = $pdo->query('PRAGMA table_info(portfolio_cards)');
    
    echo "Portfolio Cards Table Structure:\n";
    echo "================================\n";
    
    while($row = $stmt->fetch()) {
        echo $row['name'] . ' - ' . $row['type'] . "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}