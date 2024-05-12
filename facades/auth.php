<?php

require_once(__DIR__ . "/connection.php");

function loginAttempt(string $username, string $password): bool
{
  $connection = getConnection();
  $stmt = $connection->prepare("SELECT id, username FROM user WHERE username = :username AND password = :password");
  $stmt->execute([
    'username' => $username,
    'password' => $password
  ]);

  $result = $stmt->fetch(PDO::FETCH_OBJ);

  if (!$result) {
    return false;
  }

  $_SESSION["id"] = $result->id;
  $_SESSION["username"] = $result->username;

  return true;
}

function isLogged(): bool
{
  if (!isset($_SESSION["id"])) {
    return false;
  }

  return true;
}

function logout(): void
{
  session_destroy();
}
