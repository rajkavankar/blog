<?php
$title = "login";
include("./inc/header.php");
include("./inc/db.php");
include("./inc/function.php");
include("./inc/sessions.php");
if (isset($_SESSION["username"])) {
  redirect("dashboard.php");
}

if (isset($_POST["submit"])) {
  $username = htmlentities($_POST["username"]);
  $password = htmlentities($_POST["password"]);

  if (empty($username) || empty($password)) {
    $_SESSION["ErrorMessage"] = "Please fill all details";
  } elseif (!isUsernameRegistered($username)) {
    $_SESSION["ErrorMessage"] = "Username is not registered";
  } elseif (login($username, $password) === false) {
    $_SESSION["ErrorMessage"] = "Incorrect password";
  } else {
    $account = login($username, $password);
    $data = getDetails($username);
    if ($account) {
      $_SESSION["userId"] = $data->id;
      $_SESSION["username"] = $data->username;
      $_SESSION["name"] = $data->name;
      $_SESSION["email"] = $data->email;
      redirect("dashboard.php");
    }
  }
}
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <!-- CARD SECTION STARTS HERE -->
      <div class="card bg-light">
        <!-- CARD BODY STARTS HERE  -->
        <div class="card-body">
          <h3 class="card-title text-center">Login</h3>
          <!-- ALERT SECTION STARTS HERE -->
          <?php
          echo ErrorMessage();
          echo SuccessMessage();
          ?>
          <!-- ALERT SECTION ENDS HERE -->
          <!-- |--------------------------------------| -->
          <!-- FORM SECTION STARTS HERE  -->
          <form action="#" method="POST">
            <div class="form-group my-2">
              <label class="form-label" for="username">Username <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Enter username" id="username " name="username" />
            </div>
            <div class="form-group my-2 mb-3">
              <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" />
            </div>

            <div class="d-grid">
              <button type="submit" name="submit" class="btn btn-primary">
                Log in
              </button>
            </div>
          </form>
          <!-- FORM SECTION ENDS HERE -->
          <p class="text-muted text-center mt-2">
            Don't have an account&nbsp;<strong>|</strong>&nbsp;<a href="register.php" class="text-primary">Register here</a>
          </p>
        </div>
        <!-- CARD BODY ENDS HERE -->
      </div>
      <!-- CARD SECTION ENDS HERE  -->
    </div>
  </div>
</div>
<?php include("./inc/footer.php"); ?>