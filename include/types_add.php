<?php
require_once('dbconnect.php');
$title = $_POST['types'];
$query = $connect->prepare("INSERT INTO `types` (title) VALUE (?)");
$query->execute(array($title));
echo '1';
