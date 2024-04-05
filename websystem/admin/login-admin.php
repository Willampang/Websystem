<?php
require("../websystem/login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="login-admin.css" rel="stylesheet">
</head>
<body>
    <form method="POST">
        <h2>ADMIN LOGIN</h2>
        <?php if(isset($_GET["error"])){?>
            <p class="error"><?php echo $_GET["error"]; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" id="admin_name" name="admin_name" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" id="admin_password" name="admin_password" placeholder="Password"><br>
        
        <button type="submit" name="adminlogin">Login</button>
    </form>
</body>
</html>