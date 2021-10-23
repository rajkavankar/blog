<?php
require_once('inc/function.php');
require_once('inc/sessions.php');

$_SESSION["userId"] = null;
$_SESSION["username"] = null;
$_SESSION["name"] = null;
$_SESSION["email"] = null;

session_destroy();
redirect("login.php");
