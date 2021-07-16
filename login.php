<?php
require_once 'vendor/autoload.php';
require_once 'jwt.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (KelolaJwt::login($_POST['username'], $_POST['password'])) {
        header('Location: index.php');
        exit(0);
    } else {
        $message = "Gagal Login";
    }
}

?>

<html>
<head>
    <title>Login</title>
</head>
<body>
<?php if ($message) { ?>
    <h1><?= $message ?> </h1>
<?php } ?>
<h1>Login</h1>
<form action="login.php" method="post">
    <label>Username :
        <input type="text" name="username">
    </label>
    <br/>
    <label>Password :
        <input type="password" name="password">
    </label>
    <br/>
    <input type="submit" value="Login">
</form>
</body>
</html>
