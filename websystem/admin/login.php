<?php
$con = mysqli_connect("localhost","root","","admin_login");

if(mysqli_connect_error())
{
    echo "Cannot Connect";
}

?>

<?php
    if (isset($_POST['adminlogin'])) 
    {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $admin = validate($_POST['admin_name']);
        $password = validate(($_POST['admin_password']));
        
        $query = "SELECT * FROM `admin_login` WHERE `admin_name` = '$_POST[admin_name]' AND `admin_password` = '$_POST[admin_password]'";
        $result = mysqli_query($con, $query);

        if(!empty($admin && $password)){
            if(mysqli_num_rows($result) == 1)
            {
                session_start();
                header("location: admin-welcome.php");
            }
            else if(mysqli_num_rows($result) == 0){
                header("location: index.php?error=Wrong user name or password.");
            }
        }
        else if(empty($admin) && empty($password)){
            header("location: index.php?error=Please enter user name and password.");
            exit();
        }
        else if(empty($admin)){
            header("location: index.php?error=Please enter user name.");
            exit();
        }
        else if(empty($password)){
            header("location: index.php?error=Please enter password.");
        }
    }
    ?>