<?php
require_once('dbconnect.php');
$id = $_POST['types'];
$query = $connect->prepare("DELETE FROM `types`  WHERE id=:id");
$query->execute(array($id));
echo '1';
