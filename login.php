<?php
define('PAGE_TITLE', 'Login');
define('PAGE_NAME', 'login');

include_once './includes/header.php';
?>

<div class="container">
  <h1 class="text-center">Login</h1>
  <p class="text-center">
    or <a href="./register.php">Create a tricycle driver account</a>
  </p>
  <form method="POST" action="./actions/login_universal.php">
    <div class="mb-2">
      <label for="email" class="fw-bold">Email</label>
      <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="mb-2">
      <label for="password" class="fw-bold">Password</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <button class="btn btn-success w-100 mb-2">Submit</button>
  </form>
</div>