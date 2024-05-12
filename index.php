<?php

session_start();

require_once(__DIR__ . "/facades/auth.php");

if (!isLogged()) {
  require_once(__DIR__ . "/facades/route.php");
  redirect("login.php");
}

$title = "home";

include(__DIR__ . "/templates/header.php");

?>
<h1>hello <?= $_SESSION["username"] ?></h1>
<a href="logout.php">logout</a>

<?php include(__DIR__ . "/templates/footer.php"); ?>
