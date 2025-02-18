<?php
session_start();
session_destroy();
header("Location: ../html/iniciar-sesion.html");
exit();
?>
