<?php
require_once "autoload.php";

$tablename = $_POST["tablename"];
$formname = $_POST["formname"];
$itmid = $_POST["itm_id"];
$usr = $_SESSION['usr_id'];

//delete

if ($_POST['markdone'] == "Mark as done") {

    $sql = "UPDATE todoItem SET itm_done = 1 WHERE itm_id = $itmid";

}
    if (ExecuteSQL($sql)) {
        $new_url = $_application_folder . "?updateOK=true";
}

header("Location: $new_url");