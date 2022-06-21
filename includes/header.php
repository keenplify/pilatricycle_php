<?php 
session_start();
DEFINE('__WEBSITE_NAME__', 'PilaTricycle');

$activeClass = "active fw-bold";

if (isset($_GET["status"])) {
?>
<script>
  alert("<?php echo str_replace("_", " ", $_GET["status"])?>")
  window.location=window.location.href.split('?')[0];
</script>
<?php 
  exit;
} 
?>

<head>
  <title><?php echo PAGE_TITLE ?> - <?php echo __WEBSITE_NAME__ ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous" defer></script>
</head>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./"><?php echo __WEBSITE_NAME__ ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo PAGE_NAME == "index" ? $activeClass:""?>" aria-current="page" href="./index.php">Home</a>
        </li>
        <?php if (isset($_SESSION["driver"])) { ?>
        <li class="nav-item">
          <a class="nav-link <?php echo PAGE_NAME == "queue" ? $activeClass:""?>" href="./queue.php">Queue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
        <?php } elseif (isset($_SESSION["admin"])) { ?>
        <li class="nav-item">
          <a class="nav-link <?php echo PAGE_NAME == "queue" ? $activeClass:""?>" href="./queue.php">Queue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link <?php echo PAGE_NAME == "login" ? $activeClass:""?>" href="./login.php">Login</a>
        </li>
        <?php } ?>
      </ul>

    </div>
  </div>
</nav>