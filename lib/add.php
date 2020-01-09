<?php
require_once "autoload.php";

$tablename = $_POST["tablename"];
$formname = $_POST["formname"];
$usr = $_SESSION['usr']['usr_id'];


if ( $_POST["addtodo"] == "Add" )
{
    $sql_body = array();

    $sql_body['0'] = "itm_usr_id = '$usr'";

    //key-value pairs samenstellen
    foreach( $_POST as $field => $value )
    {
        if ( in_array($field, array("tablename", "formname", "addtodo"))) continue;

        $sql_body[]  = " $field = '" . htmlentities($value, ENT_QUOTES) . "' " ;
    }


    //insert

    $sql = "INSERT INTO $tablename SET " . implode( ", " , $sql_body );


    if ( ExecuteSQL($sql) ) {
        $new_url = "$_application_folder?insertOK=true";
    }
    else {
        $new_url = "$_application_folder?insertOK=false";
    }
}


header("Location: $new_url");
?>