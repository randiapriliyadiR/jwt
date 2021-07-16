<?php
require_once 'vendor/autoload.php';
require_once 'jwt.php';

try {
    $login = KelolaJwt::cekLogin();
} catch (Exception $exception) {
    header('Location: login.php');
    exit(0);
}

?>

<html>
<head>

</head>
<body>
<h1>Hello <?= $login['username'] ?></h1>
</body>
</html>
