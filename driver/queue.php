<?php
define('PAGE_TITLE', 'Queue');
define('PAGE_NAME', 'queue');

include_once '../autoload.php';
include_once '../includes/header.php';

// Check if driver exists
if (!isset($_SESSION["driver"])) {
  header("Location: ../login.php?status=Please_login_to_continue");
}

use database\MySQL;

$mysql = new MySQL();

$driverUUID = $_SESSION["driver"]["driver_uuid"];

$myQueueStmt = $mysql->connection->prepare("
  SELECT * 
  FROM queue_elements_tbl 
  WHERE queue_status = 'ACTIVE' 
  ORDER BY queue_created_at ASC
");
$myQueueStmt->execute();
$result = $myQueueStmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
$queuePosition = 1;
foreach ($data as $key => $_qElement) {
  if ($_qElement["queue_driver_uuid"] == $driverUUID) {
    $queueElement = $_qElement;
    break;
  } else {
    $queuePosition++;
  }
}
?>
<div class="container">
  <div class="text-center">
    <h1>My Queue</h1>
    <h5>(Total of <?php echo sizeof($data)?> drivers currently on queue)</h5>
  </div>
  <?php 
  // Checks if user has queue for this day that is active
  if (isset($queueElement)) {
  ?>
  <div class="card shadow">
    <div class="card-body">
      <div class="mb-1">
        <strong>Queue position: </strong>
        <?php echo $queuePosition;?>
      </div>
      <div class="mb-1">
        <strong>Queued at: </strong>
        <?php echo date("F j, Y \\a\\t h:iA ", strtotime($queueElement["queue_created_at"]));?>
      </div>
    </div>
    <div class="card-footer">
      <a href="../actions/remove_queue.php?queue_uuid=<?php echo $queueElement["queue_uuid"]?>" class="btn btn-danger">Remove from Queue</a>
    </div>
  </div>
  <?php
  } else {
  ?>
  <div>
    <p>No active queue with your account found.</p>
    <a href="../actions/add_queue.php" class="btn btn-primary">Add Queue</a>
  </div>
  <?php } ?>
</div>