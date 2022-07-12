<h1>Login Page</h1>

<form method="post" action="">
  <div class="container">
  <br><br><br><br>
    <div class="form-group">
      <label>Username </label>
      <input name="username" type="text" placeholder="Username" 
      class="form-control<?php //echo $model->hasError('username') ? ' is-invalid' : ''?>">
    </div>
    <div class="form-group">
      <label>Password </label>
      <input name="password" type="password" placeholder="Password" 
      class="form-control<?php //echo $model->hasError('password') ? ' is-invalid' : ''?>">
    </div>
    <br>
    <button name="submit" type="submit" value="submit">Log In</button>
  </div>
</form>
<br><br>
Not a Member? <button><a href="/register">Register</a></button>




