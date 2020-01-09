<?php
$login = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "loginform" AND $buttonvalue == "Log in" )
{
    if ( ControleLoginWachtwoord( $_POST['usr_name'], $_POST['usr_password'] ) )
    {
        header("Location: ". $_application_folder . "/index.php");
    }
    else
    {
        header("Location: ". $_application_folder . "/login.php");
    }
}
?>