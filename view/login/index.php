<h2> Login </h2>
    <?php
    if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
        echo "<h2>You are logged in! grats</h2>";
        echo "<a href='logout'>Click here to logout!</a>";
    } else {
        if (isset($loginError)) {
            echo $loginError;
        }
    ?>
<form action="login" method="POST">
    <input type="text" id="username" name="username">
    <input type="password" id="password" name="password">
    <input type="submit" value="login">
</form>
<?php
    } ?>
