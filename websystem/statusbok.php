
<?php

// session_start();

// Check if the user is not logged in
/* if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}
*/
// Database connection

include('dbconn.php');
// Create connection
$conn = new mysqli($servername, $name, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve booking data from database
$sql = "SELECT * FROM snookerbookdb";
$result = $conn->query($sql);

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html>


<head>
    <title>Booking Status</title>

</head>
<body>
<link href="status2.css" rel="stylesheet" type="text/css"/>

    <h1>Booking Status</h1>
    <a href="bookingstatus.php" class="button">Book A Court</a>

    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Court</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Status</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        if (mysqli_num_rows($result) > 1) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr class="input">
                    <td><center><?php echo $no++; ?></center></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['court']; ?></td>
                    <td><?php echo $row['start_time']; ?></td>
                    <td><?php echo $row['end_time'];?></td>
                    <td> successfully </td>
                    
            
</tr>
            
<?php
            }
         }
     } 
        ?>
    </table>
</body>
</html>
<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: white;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: grey;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    color: black;
}

tr:hover {
    background-color: #f2f2f2;
}

th {
    background-color: #007bff;
    color: #fff;
}

.center {
    margin: 0 auto;
}
.button {
    display: inline-block;
    background-color: cyan;
    color: black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}

.button:hover {
    background-color: #0056b3;
} </style>
