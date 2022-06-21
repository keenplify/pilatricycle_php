<?php
include_once '../autoload.php';

use database\MySQL;

$mysql = new MySQL();

session_start();

// Check if driver exists
if (!isset($_SESSION["driver"])) {
  header("Location: ../login.php?status=Please_login_to_continue");
}

$insertStmt = $mysql->connection->prepare("INSERT INTO queue_elements_tbl (queue_driver_uuid) VALUES (?)");
$insertStmt->bind_param("s", $_SESSION["driver"]["driver_uuid"]);
$insertStmt->execute();

header("Location: ../driver/queue.php");