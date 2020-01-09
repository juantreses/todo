<?php
session_start();

require_once "pdo.php";
require_once "viewFunctions.php";
require_once "authorization.php";

$_application_folder ="/wdev_joannes/todo";


if ( ! isset($_SESSION['usr']) AND ! $login)
{
    header("Location: " . $_application_folder . "/login.php");
}