<?php     
    if (isset($_POST['submit'])) {  
        if ($nameErr == "" && $emailErr == "" && $genderErr == "" && $phoneErr == "" && $usernameErr == "" && $passwordErr == "" && $confirmpasswordErr == "") {
            session_start();
            $username = $_POST["username"];
            $password = $_POST["password"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $phone = $_POST["phone"];  
            $stmt = $conn -> prepare("INSERT INTO user (username, password, name, email, gender, phone) 
            VALUES (?,?,?,?,?,?)");
            $stmt -> bind_param("sssssi", $username, $password, $name, $email, $gender, $phone);
            $stmt -> execute();
            $stmt -> close();
            $conn -> close();
            // echo "<h3> <p style=\"color:Green;\"><b>Form Submitted Successfully.</b></p></h3>";
            header('location:index.php');
        //}
        
        } else {  
            echo "<h3> <p style=\"color:red;\"><b>You didn't filled up the form correctly.</b></p></h3>";  
        } 
    }

?>