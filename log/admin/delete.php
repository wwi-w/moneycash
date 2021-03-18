
<?php

include "db.php"

?>
<?php
$ids = $_GET['id'];
$del=mysqli_query($db, "DELETE FROM users WHERE uid=$ids");
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
