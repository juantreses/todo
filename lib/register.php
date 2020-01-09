<?php
$login = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['registerbutton'];
$tablename = $_POST['tablename'];

if ( $formname == "registerform" AND $buttonvalue == "Register" )
{
//controle of gebruiker al bestaat
    $sql = "SELECT * FROM $tablename WHERE usr_username='" . $_POST['usr_name'] . "'";
    $data = GetData($sql);

    if ( count($data) > 0 ) {
        die("username is already taken");
    }

    //wachtwoord coderen
    $password_encrypted = password_hash ( $_POST["usr_password"] , PASSWORD_DEFAULT );

    $sql = "INSERT INTO $tablename SET " .
        " usr_username='". htmlentities($_POST['usr_name'], ENT_QUOTES) . "' , " .
        " usr_password='" . $password_encrypted . "'";



    if (ExecuteSQL($sql)) {
        if ( ControleLoginWachtwoord( $_POST["usr_name"] , $_POST["usr_password"]) )
        {
            header("Location: ". $_application_folder . "/index.php");
        }
    }
}
?>