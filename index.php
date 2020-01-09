<?php
require_once "lib/autoload.php";

basicHead();
?>
<div class="list">
    <h1 class="header">To Do</h1>
    <ul class="list-unstyled items">
<?php
$sql = "SELECT * FROM todoItem WHERE itm_usr_id = " . $_SESSION['usr']['usr_id'] . " ORDER BY itm_done ASC LIMIT 20";
$data = GetData($sql);

$todo = loadTemplate("todo");

foreach ( $data as $key => $val )
{

    $mark = "<form action='lib/done.php' method='post' class='mark'>
                <input type=\"hidden\" id=\"formname\" name=\"formname\" value=\"done\">
                <input type=\"hidden\" id=\"tablename\" name=\"tablename\" value=\"todoItem\">
                <input type='hidden' id='itm_id' name='itm_id' value=" . $data[$key]['itm_id'] . ">
                <input type='submit' name='markdone' value='Mark as done' class='done-button'></form>";

    $delete = "<form action='lib/delete.php' method='post' class='mark'>
                <input type=\"hidden\" id=\"formname\" name=\"formname\" value=\"delete\">
                <input type=\"hidden\" id=\"tablename\" name=\"tablename\" value=\"todoItem\">
                <input type='hidden' id='itm_id' name='itm_id' value=" . $data[$key]['itm_id'] . ">
                <input type='submit' name='delete' value='Delete' class='done-button'></form>";

    if($data[$key]['itm_done'] == 1){
        $data[$key]['done'] = "done";
        $data[$key]['delete'] = $delete;
    }else{
        $data[$key]['active'] = " ";
        $data[$key]['delete'] = $mark;
    }

}
print replaceContent($data, $todo);
?>
    </ul>
    <form action="lib/add.php" method="post" class="item-add">
        <input type="hidden" id="formname" name="formname" value="todo">
        <input type="hidden" id="tablename" name="tablename" value="todoItem">
        <label for="itm_name"></label>
        <input type="text" name="itm_name" id="itm_name" placeholder="Type a new item here" class="input" autocomplete="off" required>
        <input type="submit" name="addtodo" value="Add" class="submit">
    </form>
    <a href="lib/logout.php">Log out</a>
</div>
</body>
</html>
