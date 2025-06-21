<?php
require_once '_inc/autoload.php';

$db = new Database();
$pdo = $db->getConnection();

$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $password]);

echo "Admin user created!";