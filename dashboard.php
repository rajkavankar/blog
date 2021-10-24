<?php
$title = "Dashboard";
include("./inc/header.php");
include("./inc/db.php");
include("./inc/function.php");
include("./inc/sessions.php");
isLoggedin("Login required", "login.php");
?>
<?php include("./inc/navbar.php") ?>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-4">
      <img src="images/avatar.png" alt="avatar" width="250" class="rounded-circle" />
    </div>
    <div class="col-md-8">
      <h1 class="display-4"><?php echo $_SESSION["name"]; ?></h1>
      <h2><?php echo $_SESSION["email"]; ?></h2>
    </div>
  </div>
  <!-- <h1 class="mt-4">
        posts
        <span class="badge bg-primary">0</span>
      </h1>
      <div class="card card-body my-4">
        <div class="card-title"></div>
      </div> -->
</div>

<?php include("./inc/footer.php"); ?>