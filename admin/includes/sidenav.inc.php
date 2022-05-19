<link href="./css/sidenav.css" rel="stylesheet"/>

<nav class="side-nav">
  <h1>advanced to do list</h1>
  <h5>admin</h5>
  <ul class="side-links">
    <li class="side-li"><a href="index.php"><i class="fa fa-dashboard"></i>dashboard</a></li>
    <li class="side-li"><a href="users.php"><i class="fa fa-user"></i>users</a></li>
    <li class="side-li"><a href="project.php"><i class="fa fa-book"></i>project</a></li>
    <li class="side-li"><a href="tasks.php"><i class="fa fa-list"></i>tasks</a></li>
    <li class="side-li"><a href="banners.php"><i class="fa fa-tv"></i>banners</a></li>
    <li class="side-li"><a href="logout-user.php"><i class="fa fa-sign-out"></i>logout</a></li>
    <li class="side-li"><a href="#"><i class="fa fa-dark"></i></a>
      <button class="dark_mode" onclick="switchDarkMode()">switch to dark mode</button>
    </li>
  </ul>
</nav>

<script>
function switchDarkMode() {
var element = document.body;
element.classList.toggle("dark-mode");
}
</script>
