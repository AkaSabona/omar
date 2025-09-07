<?php

try {
    $pdo = new PDO('sqlite:database/database.sqlite');
    $pdo->exec('ALTER TABLE portfolio_cards ADD COLUMN image VARCHAR(255) NULL');
    echo "Image column added successfully\n";
    
    // Verify the column was added
    $stmt = $pdo->query('PRAGMA table_info(portfolio_cards)');
    echo "\nUpdated table structure:\n";
    while($row = $stmt->fetch()) {
        echo $row['name'] . ' - ' . $row['type'] . "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}