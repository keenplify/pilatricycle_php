<?php

include_once '../autoload.php';

use database\MySQL;

$mysql = new MySQL();

if (
  (!isset($_POST["email"])) || (strlen($_POST["email"]) == 0) ||
  (!isset($_POST["password"])) || (strlen($_POST["password"]) == 0)
) {
  header("Location: ../login.php?status=Incomplete_form");
  exit;
}

$selectAdminsStmt = $mysql->connection->prepare("SELECT * FROM admins_tbl WHERE admin_email=?");

$selectAdminsStmt->bind_param(
  "s",
  $_POST["email"]
);

// Dont run if not executed!
if (!$selectAdminsStmt->execute()) {
  header("Location: ../login.php?status=Unable_to_login");
  exit;
}

$adminsResult = $selectAdminsStmt->get_result();

//Check if user exist in admin table
if ($adminsResult->num_rows > 0) {
  $data = $adminsResult->fetch_assoc();

  // Check if password is correct
  if (!password_verify($_POST["password"], $data["admin_password"])) {
    header("Location: ../login.php?status=Invalid credentials");
    exit;
  }

  // Save driver in session and continue log in
  session_start();
  $_SESSION["admin"] = $data;
  header("Location: ../admin/index.php");
  exit;
}

$selectAdminsStmt->close();

// Check in drivers table if not found in admin
$selectDriversStmt = $mysql->connection->prepare("SELECT * FROM tricycle_drivers_tbl WHERE driver_email=?");

$selectDriversStmt->bind_param(
  "s",
  $_POST["email"]
);

// Dont run if not executed!
if (!$selectDriversStmt->execute()) {
  header("Location: ../login.php?status=Unable_to_login");
  exit;
}

$driversResult = $selectDriversStmt->get_result();

// Check if user exists in driver table
if ($driversResult->num_rows > 0) {
  $data = $driversResult->fetch_assoc();

  // Check if password is correct
  if (!password_verify($_POST["password"], $data["driver_password"])) {
    header("Location: ../login.php?status=Invalid credentials");
    exit;
  }

  // Save driver in session and continue log in
  session_start();
  $_SESSION["driver"] = $data;
  header("Location: ../driver/index.php");
  exit;
}

// Return with no user found
header("Location: ../login.php?status=No_user_found!");