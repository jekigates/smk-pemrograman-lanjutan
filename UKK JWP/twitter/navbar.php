<!--
ini html untuk navbar dimana saat satu perubahan terjadi pada file ini,
maka semua halaman akan mengalami perubahan pada navbarnya juga.
-->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Twitter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./home.php">Home</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <form class="d-flex" action="./home.php">
            <input class="form-control me-2" type="search" name="tag" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit" >Search</button>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <form action="./crud.php?cmd=logout" method="POST">
            <button class="btn btn-danger" type="submit">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>