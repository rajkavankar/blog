 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
     <div class="container">
         <a class="navbar-brand" href="#">profile</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarColor01">
             <ul class="navbar-nav ms-auto">
                 <!-- <li class="nav-item">
                     <a class="nav-link" href="./logout.php">Logout</a>
                 </li> -->

                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["username"]; ?></a>
                     <div class="dropdown-menu">
                         <!-- <a class="dropdown-item" href="#">Profile</a> -->
                         <a class="dropdown-item" href="./logout.php">logout</a>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </nav>