<?php
// session_start(); when got login page put in this shit

// Check if the user is not logged in
/*
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}
*/

// Database connection parameters
include('dbconn.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = new mysqli($servername, $name, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set parameters with form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $startTime = $_POST["start_time"];
    $endTime = $_POST["end_time"];
    $court = $_POST["court"]; // Added court field

    // Prepare SQL statement to check if the time slot is available
    $stmt_check = $conn->prepare("SELECT * FROM snookerbookdb WHERE date = ? AND ((start_time >= ? AND start_time < ?) OR (end_time > ? AND end_time <= ?)) AND court = ?");
    $stmt_check->bind_param("ssssss", $date, $startTime, $endTime, $startTime, $endTime, $court);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    
    // If the time slot is available, proceed with booking
    if ($result_check->num_rows === 0) {
        // Prepare SQL statement to insert form data into the database
        $stmt_insert = $conn->prepare("INSERT INTO snookerbookdb (name, email, phone, date, start_time, end_time, court) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_insert->bind_param("sssssss", $name, $email, $phone, $date, $startTime, $endTime, $court);

        // Execute the SQL statement to insert the booking
        if ($stmt_insert->execute() === TRUE) {
            echo "<script>alert('Booking Successfully.'); document.location.href = 'statusbok.php';</script>";
        } else {
            echo "<script>alert('Error.'); document.location.href = 'booking.php';</script>";
        }

        // Close statement and connection
        $stmt_insert->close();
    } else {
        // If the time slot is not available, display an error message
        echo "<script>alert('The selected time slot is already booked. Please choose another time.'); document.location.href = 'booking.php';</script>";
    }

    // Close statement and connection
    $stmt_check->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Snooker Booking Form</title>
    <link href="bookingPage.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
    <h2>SNOOKER<header> Booking Form</h2>   
    <a href="statusbok.php" class="button">Booking List</a>
        
    <h3>Court:
        <select name="court">
            <option value="1">Court 1</option>
            <option value="2">Court 2</option>
            <option value="3">Court 3</option>
            <option value="4">Court 4</option>
            <option value="5">Court 5</option>
            <option value="6">Court 6</option>
            <option value="7">Court 7</option>
            <option value="8">Court 8</option>
            <option value="9">Court 9</option>
            <option value="10">Court 10</option>
        </select>  </h3>
        
    <label>Name:</label>
        <input type="text" name="name" placeholder="TAN KUAN QI" required>

        <label>Email:</label>
        <input type="email" name="email" placeholder="xxx@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>

        <label>Phone:</label>
        <input type="text" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"  title="Please enter a valid phone number (123-456-7890)." required>

        <label>Date:</label>
        <input type="date" name="date" required>

        <label>Start Time:</label>
        <input type="time" id="start_time" name="start_time" onchange="endTimeChanged()">

        <label>End Time:</label>
        <input type="time" id="end_time" name="end_time">

       

        <input type="submit" value="Submit">
    </form>

    <script>
        // Function to calculate the difference between two times in hours
        function timeDiffInHours(startTime, endTime) {
            const start = new Date("2022-01-01 " + startTime);
            const end = new Date("2022-01-01 " + endTime);
            const diffMs = end - start;
            return diffMs / (1000 * 60 * 60);
        }

        // Function to validate the form before submission
        function validateForm() {
            const startTime = document.getElementById("start_time").value;
            const endTime = document.getElementById("end_time").value;

            // Check if end time is empty
            if (endTime === "") {
                alert("Please select an end time.");
                return false;
            }

            // Check if end time is at least 2 hours after start time
            const duration = timeDiffInHours(startTime, endTime);
            if (duration < 2) {
                alert("Booking duration must be at least 2 hours.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
<style>.button {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    float: right;
}

.button:hover {
    background-color: #0056b3;
}   </style>