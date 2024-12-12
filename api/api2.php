<?php
$r = file_get_contents('php://input');
$r = json_decode($r, true);
print_r($r);
