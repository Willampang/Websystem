<?php
$conn = mysqli_connect("localhost", "root", "", "login");

$error = "";
$errorr = "";

if(isset($_POST["login-button"])){
    $username = mysqli_real_escape_string($conn, $_POST["login-username"]);
    $password = mysqli_real_escape_string($conn, $_POST["login-password"]);

    if(empty($username) || empty($password)){
        $errorr = "Please fill in all fields";
    }
    else{
        $query = "SELECT * FROM `users` WHERE `Username` = '{$username}'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['Password'])){
                // Successful login
                session_start();
                header("location: ../websystem/index.php");
            } else {
                $errorr = "Incorrect password. Please try again.";
            }
        } else {
            $errorr = "User not found. Please register first.";
        }
    }
}

if(isset($_POST["register-button"])){
    $username = mysqli_real_escape_string($conn, $_POST["reg-user-name"]);
    $email = mysqli_real_escape_string($conn, $_POST["reg-user-email"]);
    $password = mysqli_real_escape_string($conn, $_POST["reg-user-password"]);
    $confPass = mysqli_real_escape_string($conn, $_POST["reg-user-confPassword"]);

    if(empty($username) || empty($email) || empty($password) || empty($confPass)){
        $error = "Please fill in all fields";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email format";
    }
    elseif($password != $confPass){
        $error = "Passwords do not match";
    }
    else{
        $query = "SELECT * FROM `users` WHERE `Username` = '{$username}' OR `Email` = '{$email}'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $error = "Username or email already exists";
        }
        else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query1 = "INSERT INTO `users` (Username, Email, Password) VALUES ('{$username}','{$email}','{$hashed_password}')";
            $result = mysqli_query($conn, $query1); 

            if ($result) {
                header("Refresh:0");
                exit();
            }
            else{
                $error = "Registration failed";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login-user.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

<div class="login">
    <div class="form-box">
        <div class="button-box">
            <div id="button-color"></div>
            <button type="button" class="button" onclick="login()">Log In</button>
            <button type="button" class="button" onclick="register()">Register</button>
        </div>
        
        <form id="log-in" class="user-detail" method="POST">
        <?php
            if(!empty($errorr)){
                echo '<div class="from control">
                <p class="error">';
                echo $errorr;
                echo'</p>
                </div>';
            }
            ?>
            <input type="text" class="field" id="login-username" name="login-username" placeholder="User Name" >
            <input type="password" class="field" id="login-password" name="login-password" placeholder="Password" >
            <input type="checkbox" class="check-box">
            <span>Remember Password</span>
            <button type="submit" name="login-button" class="login-button">Log In</button>
        </form>

        <form id="register" class="user-detail" method="POST">
        <?php
            if(!empty($error)){
                echo '<div class="from control">
                <p class="error">';
                echo $error;
                echo'</p>
                </div>';
            }
            ?>
            <input type="text" class="field" id="reg-user-name" name="reg-user-name" placeholder="User Name" >
            <input type="email" class="field" id="reg-user-email" name="reg-user-email" placeholder="Email" >
            <input type="password" class="field" id="reg-user-password" name="reg-user-password" placeholder="Password" >
            <input type="password" class="field" id="reg-user-confPassword" name="reg-user-confPassword" placeholder="Confirm Password" >
            
            <input type="checkbox" id="checkbox" class="check-box" required>
            <span>I agree to the terms conditions</span>
            <button type="submit" name="register-button" class="register-button">Register</button>
        </form>
    </div>
</div>

<script>
    var x = document.getElementById("log-in");
    var y = document.getElementById("register");
    var z = document.getElementById("button-color");

    function register(){
        x.style.left = '-400px';
        y.style.left = '50px';
        z.style.left = '110px';
        z.style.background = 'linear-gradient(to right,rgb(0, 255, 85),rgb(0, 238, 255))';
    }

    function login(){
        x.style.left = '50px';
        y.style.left = '450px';
        z.style.left = '0px';
        z.style.background = 'linear-gradient(to right,rgb(0, 238, 255),rgb(0, 255, 85))';

        
    }
</script>

</body>
</html>
