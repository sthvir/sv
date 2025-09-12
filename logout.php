<?php
session_start();
session_unset();
session_destroy();
// redirect to lock page
header("Location: lock.php");
exit();
