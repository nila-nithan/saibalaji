<?php
session_start();
session_destroy();
// include("config/database.php");
header("Location: index.php");
exit();

?>