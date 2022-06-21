<?php
define('PAGE_TITLE', 'Queue');
define('PAGE_NAME', 'queue');

include_once '../autoload.php';
include_once '../includes/header.php';

// Check if driver exists
if (!isset($_SESSION["admin"])) {
  header("Location: ../login.php?status=Please_login_to_continue");
}

use database\MySQL;

$mysql = new MySQL();

$myQueueStmt = $mysql->connection->prepare("
  SELECT * 
  FROM queue_elements_tbl 
  LEFT JOIN tricycle_drivers_tbl 
  ON tricycle_drivers_tbl.driver_uuid = queue_driver_uuid 
  WHERE queue_status = 'ACTIVE' 
  ORDER BY queue_created_at ASC
");
$myQueueStmt->execute();
$result = $myQueueStmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
?>
<div class="container">
  <div class="text-center">
    <h1>All Queued Drivers</h1>
    <h5>(Total of <?php echo sizeof($data)?> drivers currently on queue)</h5>
  </div>
  
  <div class="row">
    <?php 
    foreach ($data as $key => $queueElement) {
    ?>
    <div class="col-md-4 p-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="mb-1">
            <strong>Driver Name: </strong>
            <?php echo $queueElement["driver_fullname"];?>
          </div>
          <div class="mb-1">
            <strong>Queue position: </strong>
            <?php echo $key + 1;?>
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
    </div>
    <?php } ?>
  </div>
</div>