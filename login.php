<!-- Header Section -->
<?php include 'application/header.php'; ?>
<!-- Header Section -->

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br><br><br><br>
    Username: <input name="username" type="text" placeholder="username" required><br><br>
    password: <input name="password" type="password" placeholder="password" required><br><br>

    <button name="submit" type="submit">Log In</button>

</form>
<br><br>
Not a Member? <button><a href="sign-up.php">Register</a></button>





<!-- Footer Section -->
<?php include 'application/footer.php'; ?>
<!-- Footer Section -->
