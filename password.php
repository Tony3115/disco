<?php

//password hash

$mot_de_passe = "123";

//$hash = password_hash($mot_de_passe, PASSWORD_BCRYPT);
$hash = '$2y$10$sNkCGKDYSjGjB5Rx6z.QWueTAg0mPN5X/b.rMyYrpbf7jUdxksV.m';

//echo $hash;
$result = password_verify("123", $hash);
echo $result;
