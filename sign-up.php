<!-- Header Section -->
<?php include 'application/header.php'; ?>
<!-- Header Section -->
<!-- logic Section -->
<?php include 'config.php'; ?>


<!--Registration Form-->


<?php
$name = $email = $gender = $phone = $username = $password = $confirmpassword = "";
$nameErr = $emailErr = $genderErr = $phoneErr = $usernameErr = $passwordErr = $confirmpasswordErr = "";
//Name Requirement
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required!<br>";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white spaces are allowed!";
        }
    }
    //email validation and requirement
    if (empty($_POST["email"])) {
    $emailErr = "Email is required!!<br>";
    } else {
        $email_pattern= "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
        $email = $_POST["email"];
        if (preg_match($email_pattern, $email) != 1){
            $emailErr = "Your Email Address is NOT Valid!!<br>";
        } else { 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Your Email Address is NOT Valid!!<br>";
            } else {
                $email = test_input($_POST["email"]);
            }
        }        
    }
    //phone requirement 
    if (empty($_POST["phone"])) {
        $phoneErr =  "Phone is required!!<br>";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match ("/^[0-9]*$/", $phone) ) {  
            $phoneErr = "Only numeric value is allowed.";  
        }  
        //check mobile no length should not be greator than 10  
        if (strlen ($phone) > 10) {  
            $phoneErr = "Phone number must not be more than 10 digits.";  
        }  
    }
    //username requirement
    if (empty($_POST["username"])) {
        $usernameErr =  "Username is required!!<br>";
        
        
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match ("/^[a-zA-Z0-9]{5,}$/", $username) ) {  
            $usernameErr = "Use atleast 5 alphanumeric character with upper & lowercases.";  
        } 
    } 
    //password check 
    if (empty($_POST["password"])) {
        $passwordErr =  "Enter your desired Password.<br>";
    } else {
        $password = test_input($_POST["password"]);
        if (!preg_match ("/^[a-zA-Z0-9]{4,}$/", $password) ) {  
            $passwordErr = "Use atleast 5 alphanumeric character.";  
        }
    } 
    //confirm password check
    if (empty($_POST["confirmpassword"])) {
        $confirmpasswordErr =  "Enter your Password to confirm.<br>";
    } else {
        $confirmpassword = test_input($_POST["confirmpassword"]);
        $pass1 = $_POST["password"];
        $pass2 = $_POST["confirmpassword"];
        if ($pass1 != $pass2) {  
            $confirmpasswordErr = "Password doesn't match confirm password.";  
        }
    }
    //gender requirement
    if (empty($_POST["gender"])) {
        $genderErr =  "Gender is required!!<br>";
    } else {
        $gender = test_input($_POST["gender"]);
    } 
}  

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <br><br><br><br>
    Full Name: <input name="name" type="text" placeholder="Full Name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Gender:
    <input type="radio" name="gender"
    <?php
    if (isset($gender) && $gender == "male") {
        echo "checked";
    }
    ?>
    value="male">Male
    <input type="radio" name="gender"
    <?php
    if (isset($gender) && $gender == "female") {
        echo "checked";
    }
    ?>
    value="female"> Female
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    Phone No.: <input name="phone" type="number" placeholder="Phone Number" value="<?php echo $phone;?>" />
    <span class="error">* <?php echo $phoneErr;?></span>
    <br><br>
    E-mail: <input name="email" type="text" placeholder="email address" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Username: <input name="username" type="text" placeholder="username" value="<?php echo $username;?>">
    <span class="error">* <?php echo $usernameErr;?></span>
    <br><br>
    Password: <input name="password" type="password" placeholder="password" value="<?php echo $password;?>">
    <span class="error">* <?php echo $passwordErr;?></span>
    <br><br>
    Confirm Password: <input name="confirmpassword" type="password" placeholder="confirm password" value="<?php echo $confirmpassword;?>">
    <span class="error">* <?php echo $confirmpasswordErr;?></span>
    <br><br>
    <input name="submit" type="submit" value="Sign Up">
</form>
<br><br>
Already a Member? <button><a href="login.php">Log In</a></button>

<!--sign-up-logic section -->
<?php include 'sign-up-logic.php'; ?>
<!--sign-up-logic section -->

<!-- Footer Section -->
<?php include 'application/footer.php'; ?>
<!-- Footer Section -->
