<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "addevents");

$error = "";
$eventDetails = array();

if(isset($_GET['eventId'])) {
    $eventId = mysqli_real_escape_string($conn, $_GET['eventId']);
    $query = "SELECT * FROM `events` WHERE `id`='$eventId'";
    $result = mysqli_query($conn, $query);
    $eventDetails = mysqli_fetch_assoc($result);
}

// Submission
if(isset($_POST["addevent-button"])){
    $eventname = mysqli_real_escape_string($conn, $_POST["eventName"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]); // corrected name
    $date = mysqli_real_escape_string($conn, $_POST["eventDate"]);
    $time = mysqli_real_escape_string($conn, $_POST["eventTime"]);
    $duration = mysqli_real_escape_string($conn, $_POST["eventDuration"]);

    if(empty($eventname)|| empty($price)|| empty($date) || empty($time) || empty($duration)){
        $error = "Please fill in all fields";
    }
    else{
        if(!empty($eventId)){ // If eventId is not empty, update event details
            $query = "UPDATE `events` SET `eventname`='$eventname',`price`='$price', `date`='$date', `time`='$time', `duration`='$duration' WHERE `id`='$eventId'";
        } else {
            $query = "INSERT INTO `events`(`eventname`,`price`, `date`, `time`, `duration`) VALUES ('$eventname','$price','$date','$time','$duration')";
        }

        $result = mysqli_query($conn, $query);

        if($result){
            $_SESSION['event_edited'] = true;
            header("Location: events.php");
            exit();
        }
        else{
            $error = "Event addition failed";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($_GET['eventId']) ? 'Edit Event' : 'Add Event'; ?></title>
    <link rel="stylesheet" type="text/css" href="add-event.css">
    <style>
        .back-button {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<div class="container">
    <h2><?php echo isset($_GET['eventId']) ? 'Edit Event' : 'Add Event'; ?></h2>
    <?php
    if(!empty($error)){
        echo '<div class="from control">
        <p class="error">';
        echo $error;
        echo'</p>
        </div>';
    }
    ?>
    <form method="post">
        <table class="event-table">
            <tr>
                <td>Event Name:</td>
                <td><input type="text" name="eventName" value="<?php echo isset($eventDetails['eventname']) ? $eventDetails['eventname'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><input type="text" name="price" value="<?php echo isset($eventDetails['price']) ? $eventDetails['price'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="date" name="eventDate" value="<?php echo isset($eventDetails['date']) ? $eventDetails['date'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Time:</td>
                <td><input type="time" name="eventTime" value="<?php echo isset($eventDetails['time']) ? $eventDetails['time'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>Duration (in hours):</td>
                <td><input type="number" name="eventDuration" step="0.5" min="0.5" value="<?php echo isset($eventDetails['duration']) ? $eventDetails['duration'] : ''; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <?php if(isset($_GET['eventId'])): ?>
                        <input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
                    <?php endif; ?>
                    <input name="addevent-button" type="submit" value="<?php echo isset($_GET['eventId']) ? 'Update Event' : 'Add Event'; ?>">
                </td>
            </tr>
        </table>
    </form>
    <div style="text-align: center; margin-top: 20px;">
        <button class="back-button" onclick="directToEventsPage()">Back</button>
    </div>
</div>

<script>
function directToEventsPage() {
    window.location.href = 'events.php';
}
</script>

</body>
</html>
