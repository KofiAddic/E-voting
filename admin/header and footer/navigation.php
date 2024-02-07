<?PHP include('session.php');?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand">WELCOME <?PHP echo $_SESSION['login_user']?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="adminpage.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="election.php">Add Election</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="add_candidates.php">Add Candidates</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="add_partylist.php">Add Partylist</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="add_student.php">Add Voters</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

