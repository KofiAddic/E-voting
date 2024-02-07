<?php include('session2.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigate">
    <h2 class="navbar-brand">Welcome User  <b><?php echo $_SESSION['login_user1']?></b></h2>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="logout.php">Log out</a>
            </li>
        </ul>
    </div>
</nav>