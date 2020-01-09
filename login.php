<?php
$login = true;
require_once "lib/autoload.php";

basicHead();
?>
<div class="list">
    <h1>Login</h1>
    <form action="lib/login.php" method="post">
        <input type="hidden" name="formname" value="loginform">
        <ul>
            <li>
                <label for="usr_name"></label>
                <input type="text" name="usr_name" id="usr_name" placeholder="username" required>
            </li>
            <li>
                <label for="urs_password"></label>
                <input type="password" name="usr_password" id="usr_password" placeholder="password">
            </li>
            <li>
                <input type="submit" value="Log in" name="loginbutton">
            </li>
        </ul>
    </form>
    <a href="register.php">Not a member yet?</a>
</div>
