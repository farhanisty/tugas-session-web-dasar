<?php

session_start();

require_once(__DIR__ . "/facades/auth.php");
require_once(__DIR__ . "/facades/route.php");

if (isLogged()) {
  redirect("index.php");
}

$isFailLoginAttempt = false;

if (isset($_POST["username"])) {
  $result = loginAttempt($_POST["username"], $_POST["password"]);

  if ($result) {
    redirect("index.php");
  }

  $isFailLoginAttempt = true;
}

$title = "login";
include(__DIR__ . "/templates/header.php");

?>

<section class="min-vh-100 vw-100 bg-danger d-flex justify-content-center align-items-center">
  <div class="card" style="max-width: 300px">
    <h5 class="card-header">Login</h5>
    <div class="card-body">
      <?php if ($isFailLoginAttempt) : ?>
        <p class="pt-3 text-danger">Username atau password salah</p>
      <?php endif; ?>
      <form method="post">
        <div class="mb-3">
          <label for="input-username" class="form-label">username</label>
          <input type="text" name="username" id="input-username" class="form-control" autofocus>
        </div>
        <div class="mb-3">
          <label for="input-password" class="form-label">password</label>
          <input type="password" name="password" id="input-password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <p class="pt-3">Saya belum memiliki akun? klik <a href="register.php">register</a></p>
      </form>
    </div>
  </div>
</section>

<?php include(__DIR__ . "/templates/footer.php");
