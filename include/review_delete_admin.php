<?php
require_once('dbconnect.php');
$id = $_POST['id'];
$comment = $connect->prepare("DELETE FROM `review`  WHERE id=:id");
$comment->execute(array($id));
echo '1';
