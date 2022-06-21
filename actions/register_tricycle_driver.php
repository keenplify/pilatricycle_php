<?php

include_once '../autoload.php';

use database\MySQL;

$mysql = new MySQL();

if (
  (!isset($_POST["fullName"])) || (strlen($_POST["fullName"]) == 0) ||
  (!isset($_POST["email"])) || (strlen($_POST["email"]) == 0) ||
  (!isset($_POST["password"])) || (strlen($_POST["password"]) == 0) ||
  (!isset($_POST["confirmPassword"])) || (strlen($_POST["confirmPassword"]) == 0) ||
  (!isset($_POST["birthDate"])) || (strlen($_POST["birthDate"]) == 0) ||
  (!isset($_POST["address"])) || (strlen($_POST["address"]) == 0) ||
  (!isset($_POST["contactNumber"])) || (strlen($_POST["contactNumber"]) == 0) ||
  (!isset($_POST["todaNumber"])) || (strlen($_POST["todaNumber"]) == 0) ||
  (!isset($_POST["yearsInService"])) || (strlen($_POST["yearsInService"]) == 0) ||
  (!isset($_POST["plateNumber"])) || (strlen($_POST["plateNumber"]) == 0) ||
  (!isset($_POST["licenseExpirationDate"])) || (strlen($_POST["licenseExpirationDate"]) == 0)

) {
  header("Location: ../register.php?status=Incomplete_form");
  exit;
}

// Check if password matches
if ($_POST["password"] != $_POST["confirmPassword"]) {
  header("Location: ../register.php?status=Confirm_password_incorrect");
  exit;
}

$hashedPassword = password_hash($_POST["password"], PASSWORD_BCRYPT, [
  'cost' => 12
]);

$insertStmt = $mysql->connection->prepare("
INSERT INTO tricycle_drivers_tbl (
  driver_fullname,
  driver_email,
  driver_password,
  driver_birthdate,
  driver_address,
  driver_contact_number,
  driver_toda_number,
  driver_years_in_service,
  driver_plate_no,
  driver_license_expiration_date
) VALUES (?,?,?,?,?,?,?,?,?,?)
");


$insertStmt->bind_param(
  "ssssssssss",
  $_POST["fullName"],
  $_POST["email"],
  $hashedPassword,
  $_POST["birthDate"],
  $_POST["address"],
  $_POST["contactNumber"],
  $_POST["todaNumber"],
  $_POST["yearsInService"],
  $_POST["plateNumber"],
  $_POST["licenseExpirationDate"]
);

if ($insertStmt->execute()) {
  header("Location: ../login.php?status=Register_successful");
  exit;
} else {
  header("Location: ../register.php?status=Unable_to_register");
  exit;
}