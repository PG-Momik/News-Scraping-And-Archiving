<?php
require_once 'sessionStart.php'; ?>
<?php
require_once 'sessionVerification.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between px-5">
    <a class="navbar-brand" href="#">Hello <?= $_SESSION['username'] ?? ""; ?></a>
    <div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <?php
                if(!isset($_SESSION['isLogin'])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='login.php'>Login</a>";
                    echo "</li>";
                } else {
                    if ($_SESSION['priority'] > 1) {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='dashboard.php'>Dashboard</a>";
                        echo "</li>";
                    }
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='partials/logout.php'>Logout</a>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>