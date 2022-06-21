<?php
include_once '../autoload.php';

use database\MySQL;

$mysql = new MySQL();

session_start();

// Check if driver or admin exists
if (!isset($_SESSION["driver"]) && !isset($_SESSION["admin"])) {
  header("Location: ../login.php?status=Please_login_to_continue");
  exit;
}

$insertStmt = $mysql->connection->prepare("DELETE FROM queue_elements_tbl WHERE queue_uuid=?");
$insertStmt->bind_param("s", $_GET["queue_uuid"]);
$insertStmt->execute();

header("Location: ../driver/queue.php");