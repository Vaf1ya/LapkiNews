<?php
require_once('dbconnect.php');
$id = $_POST['id'];
$query = $connect->prepare("DELETE FROM `post`  WHERE id=:id");
$query->execute(array($id));
$comment = $connect->prepare("DELETE FROM `comment`  WHERE id_post=:id");
$comment->execute(array($id));
echo '1';
