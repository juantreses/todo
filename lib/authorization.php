<?php
function ControleLoginWachtwoord( $login, $paswd )
{
    //gebruiker opzoeken ahv zijn login (e-mail)
    $sql = "SELECT * FROM todoUser WHERE usr_username='". $login ."'";
    $data = GetData($sql);
    if ( count($data) == 1 )
    {
        $row = $data[0];
        //password controleren
        if ( password_verify( $paswd, $row['usr_password'] ) ) $login_ok = true;
    }

    if ( $login_ok )
    {
        session_start();
        $_SESSION['usr'] = $row;
        return true;
    }

    return false;
}