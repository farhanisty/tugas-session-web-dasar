<?php

session_start();

require_once(__DIR__ . "/facades/route.php");
require_once(__DIR__ . "/facades/auth.php");

if (isLogged()) {
  session_destroy();
}

redirect("login.php");
