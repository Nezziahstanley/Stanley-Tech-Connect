<?php
// Day 2: Logout Page (will be fully functional on Day 20)
session_start();
session_destroy();
header("Location: index.php");
exit();
?>