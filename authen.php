<?php
include "controller.php";
?>

<form method="post" action="">
    <p>enter your login<input type="text" name="login"></p>
    <p>enter your password<input type="password" name="password"></p>
    <p><input type="submit" name="send1" value="enter"></p>
</form>
<a href="register.php">not registered?</a>
<?php
if (isset($_POST['send1'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $client = new Client(NULL, NULL, NULL, NULL);
    $client->authentication($login, $password);
}