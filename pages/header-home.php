<nav class="navbar navbar-light rounded position-stickey" style="background-color:white;">
    <div class="container">
        <a class="navbar-brand text-dark" href="index.php">
            <h5> <i class="fas fa-bars"></i></h5>

        </a>
        <div class="d-flex">
            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <a href="logout.php" class="nav-link text-danger">
                    <i class="fas fa-sign-out-alt"></i></a>
            <?php
            }else{
                ?>
              <a href="login.php" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>Login
                </a>
                <a href="register.php" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i> Signup
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>