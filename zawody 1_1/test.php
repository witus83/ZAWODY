<?php

$newpassword1=admin;
$newpassword1 = password_hash($newpassword1, PASSWORD_DEFAULT);

echo $newpassword1;
?>