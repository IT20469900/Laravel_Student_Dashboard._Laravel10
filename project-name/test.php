<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=laravel', 'root', 'QSMK8Jvn');
    echo "Connected successfully to the database.";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
