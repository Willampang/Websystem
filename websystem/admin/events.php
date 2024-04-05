<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "addevents");
$error = "";

if(isset($_SESSION['event_added']) && $_SESSION['event_added']) {
    $error = "Event added successfully!";
    unset($_SESSION['event_added']);
}
if(isset($_SESSION['event_edited']) && $_SESSION['event_edited']) {
    $error = "Event edited successfully!";
    unset($_SESSION['event_edited']);
}


function getAll($tableName){
    global $conn;
    
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Function to delete event
function deleteEvent($eventId) {
    global $conn;
    $eventId = mysqli_real_escape_string($conn, $eventId);
    $query = "DELETE FROM `events` WHERE `id`='$eventId'";
    $result = mysqli_query($conn, $query);
    return $result;
}

if(isset($_POST['delete_event'])) {
    $eventId = $_POST['event_id'];
    if(deleteEvent($eventId)) {
        $success_message = "Event deleted successfully!";
    } else {
        $error = "Failed to delete event";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-skeleton.css">
    <link rel="stylesheet" href="events.css">
    <title>Add Events</title>
</head>
<body onload="openNav()">
<div class="sidebar admin-panel fade-in">
    <h2>Hello, Admin</h2>
    <ul>
        <li><a href="admin.php">Manage Users</a></li>
        <li><a href="booking-admin.php">Bookings</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="#">Settings</a></li>
        <li id="logout" onclick="logout()"><a href="#">Log Out</a></li>
    </ul>
</div>

<div class="content">
    <button class="openbtn" onclick="openNav()">☰</button>
            <?php
            if(!empty($error)){
                echo '<div class="from control">
                <p class="error">';
                echo $error;
                echo'</p>
                </div>';
            }
            elseif(!empty($success_message)) {
                echo '<div class="from control">
                <p class="success">';
                echo $success_message;
                echo'</p>
                </div>';
            }
            ?>
    <h2 id="eventdetails">Event Details</h2>
    <button id="addevent" onclick="redirectToAddEvent()">Add Events</button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Event name</th>
                <th>Price</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration(Hour)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $events = getAll('events');
            if(mysqli_num_rows($events) > 0){
                while($event = mysqli_fetch_assoc($events)){
                    ?>
                    <tr>
                        <td><?= $event['id'];?></td>
                        <td><?= $event['eventname'];?></td>
                        <td><?=$event['price'];?></td>
                        <td><?= $event['date'];?></td>
                        <td><?= $event['time'];?></td>
                        <td><?= $event['duration'];?></td>
                        <td>
                            <button class="approve-btn" onclick="redirectToEditEvent(<?= $event['id']; ?>)">Edit</button>
                            <form method="post" style="display: inline;" onsubmit="return confirmDelete();">
                                <input type="hidden" name="event_id" value="<?= $event['id']; ?>">
                                <button type="submit" class="delete-btn" name="delete_event">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }
            else{
                ?>
                <tr>
                    <td colspan="6">No Record Found</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>
let sidebarOpen = false;

function openNav() {
  if (sidebarOpen) {
    closeNav();
    sidebarOpen = false;
  } else {
    document.querySelector(".sidebar").style.width = "250px";
    sidebarOpen = true;
  }
}

function closeNav() {
  document.querySelector(".sidebar").style.width = "0";
  sidebarOpen = false;
}

function redirectToAddEvent() {
    window.location.href = 'add-events.php';
}

function redirectToEditEvent(eventId) {
    window.location.href = 'edit-events.php?eventId=' + eventId;
}

function confirmDelete() {
    return confirm("Are you sure you want to delete this event?");
}
</script>
</body>
</html>
