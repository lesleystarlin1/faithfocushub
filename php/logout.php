<?php
session_start();
session_destroy();
header("Location: ../html/login2.html");
exit();
?>