<?php
include "controller.php";
?>

<form method="post" action="">
    <p>enter your name<input type="text" name="name"></p>
    <p>enter your email<input type="email" name="email"></p>
    <p>enter your login<input type="text" name="login"></p>
    <p>enter your password<input type="password" name="password"></p>
    <p><input type="submit" name="send1" value="enter"></p>
</form>
<?php
if (isset($_POST['send1'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $client = new Client($name, $email, $login, $password);
    if ($name != NULL && $email != NULL && $login != NULL && $password != NULL) {
        $client->register();
    } else {
        echo "empty column(s)";
    }
}