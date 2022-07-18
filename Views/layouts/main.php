<?php 
use App\Core\Application; 
use App\Models\User;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Ticket Reservation System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
		ul.navbar-nav {
			margin-right: auto;
		}
		
    ul.navbar-nav-admin {
			margin-right: auto;
		}
    
    ul.navbar-nav-user {
			margin-left: 50px;
		}
    
    ul.navbar-nav-login {
			margin-left: auto;
		}
    
    ul.navbar-nav-admin-logout {
			margin-left: auto;
		}
    
    ul {
			list-style-type:none;
		}
	</style>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php if (!Application::isUser()): ?>
        <ul class="navbar-nav-admin">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">DASHBOARD
        </a>
        </li>
        </ul>
      <ul class="navbar-nav-admin-logout">
        <li class="nav-item-right">
          <a class="nav-link active" aria-current="page" href="/adminLogout">Welcome <?php echo Application::$app->admin->getDisplayName() ?>
          (Log Out)
        </a>
        </li>
      </ul>
      <?php elseif (Application::isGuest()): ?>
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/contact">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav-login">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login">LogIn</a>
        </li>
      </ul>
      <ul class="navbar-nav-register">
        <li class="nav-item">
          <a class="nav-link active" href="/register">Register</a>
        </li>
      </ul>
      <?php else: ?>
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/contact">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav-user mr-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/profile">Profile
        </a>
        </li>
      </ul>
      <ul class="navbar-nav-user-logout  mr-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/logout">Welcome <?php echo Application::$app->user->getDisplayName() ?>
          (Log Out)
        </a>
        </li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>
<div class="container">
  <?php if (Application::$app->session->getFlash('success')): ?>
  <div class="alert alert-success">
    <?php echo Application::$app->session->getFlash('success'); ?>
  </div>
  <?php endif; ?>
    {{content}}
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>