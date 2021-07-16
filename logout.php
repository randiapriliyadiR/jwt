<?php
require_once 'vendor/autoload.php';

setcookie('login', 'LOGOUT');

header('Location: login.php');