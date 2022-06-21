<?php
define('PAGE_TITLE', 'Welcome');
define('PAGE_NAME', 'index');

include_once './autoload.php';
include_once './includes/header.php';

use database\MySQL;

$mysql = new MySQL();