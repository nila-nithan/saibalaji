<?php
session_start();
session_destroy();
include("../config/database.php");
header("Location: login.php");
exit();

?>