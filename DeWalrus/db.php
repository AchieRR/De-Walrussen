<?php
// DeWalrus/db.php

$DB_HOST = '127.0.0.1';
$DB_PORT = 3306;
$DB_NAME = 'walrus';
$DB_USER = 'root';
$DB_PASS = 'ServBay.dev';

$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
];

try {
  $pdo = new PDO(
    "mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;charset=utf8mb4",
    $DB_USER,
    $DB_PASS,
    $options
  );
} catch (PDOException $e) {
  http_response_code(500);
  exit('Database-verbinding faalde: '.$e->getMessage());
}
