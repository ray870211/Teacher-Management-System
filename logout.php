<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["type"]);
header("Location:index.php");
// var_dump($_SESSION);s
