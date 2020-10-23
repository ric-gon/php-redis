<?php
require_once __DIR__ . "/vendor/autoload.php";
$redis = new Predis\Client(['host' => '127.0.0.1', 'port' => 6379, 'password' => '']);
?>
