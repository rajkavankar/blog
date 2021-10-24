<?php
include("./inc/db.php");
$title = "Registration";
include("./inc/header.php");
include("./inc/function.php");
include("./inc/sessions.php");
if (isset($_SESSION["username"])) {
  redirect("dashboard.php");
}

if (isset($_POST["submit"])) {
  $name = htmlentities($_POST["name"]);
  $email = htmlentities($_POST["email"]);
  $username = htmlentities($_POST["username"]);
  $password = htmlentities($_POST["password"]);
  $cnfpassword = htmlentities($_POST["cnfpassword"]);

  if (empty($name) || empty($email) || empty($username) || empty($password) || empty($cnfpassword)) {
    $_SESSION["ErrorMessage"] = "Please fill all details";
  } elseif (isEmailRegistered($email)) {
    $_SESSION["ErrorMessage"] = "Email is already registered";
  } elseif (isUsernameRegistered($username)) {
    $_SESSION["ErrorMessage"] = "Username is already registered";
  } elseif ($password !== $cnfpassword) {
    $_SESSION["ErrorMessage"] = "Passwords doesn't match";
  } else {
    register($name, $username, $email, $password);
    $_SESSION["SuccessMessage"] = "You are successfully registered";
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
          <h3 class="card-title text-center">Register</h3>
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
              <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" />
            </div>

            <div class="form-group my-2">
              <label class="form-label" for="username">Username <span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Enter username" id="username" name="username" />
            </div>

            <div class="form-group my-2">
              <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" />
            </div>

            <div class="form-group my-2 mb-3">
              <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" />
            </div>

            <div class="form-group my-2 mb-3">
              <label class="form-label" for="cnfpassword">Confirm Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" placeholder="Confirm password" id="cnfpassword" name="cnfpassword" />
            </div>

            <div class="d-grid">
              <button type="submit" name="submit" class="btn btn-primary">
                Register
              </button>
            </div>
          </form>
          <!-- FORM SECTION ENDS HERE -->
          <p class="text-muted text-center mt-2">
            already have an account&nbsp;<strong>|</strong>&nbsp;<a href="login.php" class="text-primary">Login here</a>
          </p>
        </div>
        <!-- CARD BODY ENDS HERE -->
      </div>
      <!-- CARD SECTION ENDS HERE  -->
    </div>
  </div>
</div>
<?php include("./inc/footer.php"); ?>