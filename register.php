<?php
define('PAGE_TITLE', 'Register');
define('PAGE_NAME', 'register');

include_once './includes/header.php';
?>

<div class="container">
  <h1 class="text-center">Register Tricycle Driver</h1>
  <p class="text-center">
    or <a href="./login.php">Login an account</a>
  </p>
  <form method="POST" action="./actions/register_tricycle_driver.php">
    <div class="mb-2">
      <label for="fullName" class="fw-bold">Full Name</label>
      <input id="fullName" name="fullName" class="form-control">
    </div>
    <div class="mb-2">
      <label for="email" class="fw-bold">Email</label>
      <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="row">
      <div class="col-md-6 mb-2">
        <label for="password" class="fw-bold">Password</label>
        <input type="password" id="password" name="password" class="form-control">
      </div>
      <div class="col-md-6 mb-2">
        <label for="confirmPassword" class="fw-bold">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
      </div>
    </div>
    <div class="mb-2">
      <label for="birthDate" class="fw-bold">Birth Date</label>
      <input type="date" id="birthDate" name="birthDate" class="form-control">
    </div>
    <div class="mb-2">
      <label for="address" class="fw-bold">Address</label>
      <input id="address" name="address" class="form-control">
    </div>
    <div class="mb-2">
      <label for="contactNumber" class="fw-bold">Contact Number</label>
      <input id="contactNumber" name="contactNumber" class="form-control">
    </div>
    <div class="row">
      <div class="col-md-6 mb-2">
        <label for="todaNumber" class="fw-bold">Toda Number</label>
        <input id="todaNumber" name="todaNumber" class="form-control">
      </div>
      <div class="col-md-6 mb-2">
        <label for="yearsInService" class="fw-bold">Years in Service</label>
        <input type="number" id="yearsInService" name="yearsInService" class="form-control" min="0">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-2">
        <label for="plateNumber" class="fw-bold">Plate Number</label>
        <input type="text" id="plateNumber" name="plateNumber" class="form-control">
      </div>
      <div class="col-md-6 mb-2">
        <label for="licenseExpirationDate" class="fw-bold">License Expiration Date</label>
        <input type="date" id="licenseExpirationDate" name="licenseExpirationDate" class="form-control">
      </div>
    </div>
    <button class="btn btn-success w-100 mb-2">Submit</button>
    <button type="reset" class="btn btn-secondary w-100 mb-2">Reset</button>
  </form>
</div>