
<?php

include "db.php"

?>
<?php
$id = $_GET['id'];
$del=mysqli_query($db, "DELETE FROM contact WHERE id=$id");
if($del)
{
    mysqli_close($db);
    header('location: index.php');
    exit;
}
else
{
    echo "Error deleting records";

}



?>
