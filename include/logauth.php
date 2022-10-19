<?php
unset($_COOKIE['user']);
setcookie('user', $id, strtotime("-30 days"), '/');
header("Location: ../index.php");
