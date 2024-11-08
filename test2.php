<?php
$s = "123";
$hash = '$2y$10$fwkLRx6bpyY7QIqDO1EJKu43b9c3rL7DJuOqcqNIcBkrekvatZ0dK';
echo password_verify($s, $hash);

//string $password = 123
