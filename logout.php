<?php
session_start();

session_destroy();
header('Location: http://mini_projet.test/login.php');
