<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="http://mytwitter.local/">MyTwitter</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://mytwitter.local/">Home</a>
        </li>
        
        <?php if (isset($_SESSION['user_info'])) { ?>
          <li class="nav-item"><a class="nav-link" href="http://mytwitter.local/home/following">Follows</a></li>
          <li class="nav-item"><a class="nav-link" href="http://mytwitter.local/Notifications">Notifications</a></li>
          <li class="nav-item"><a class="nav-link" href="http://mytwitter.local/profile">Profile</a></li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="http://mytwitter.local/login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="http://mytwitter.local/signup">Signup</a></li>
        <?php } ?>
      </ul>

      <form class="d-flex" action="http://mytwitter.local/search" method="post">
        <input class="form-control me-2 rounded-pill" type="search" name="search" placeholder="Search..." required>
        <button class="btn btn-outline-primary rounded-pill" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>