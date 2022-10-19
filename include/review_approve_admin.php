<?php
require_once('dbconnect.php');
$id = $_POST['id'];
$article = $connect->query("UPDATE `review` SET `status` = 'Обработано' WHERE id='$id'");
echo '1';
