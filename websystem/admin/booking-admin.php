<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="admin-skeleton.css">
<link rel="stylesheet" href="booking-admin.css">
</head>
<body onload="openNav()">

<div class="sidebar admin-panel fade-in">
    <h2>Hello, Admin</h2>
    <ul>
        <li><a href="admin.php">Manage Users</a></li>
        <li><a href="#">Bookings</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="#">Settings</a></li>
        <li id="logout" onclick="logout()"><a href="#">Log Out</a></li>
    </ul>
</div>

<div class="content">
    <button class="openbtn" onclick="openNav()">☰</button>  
</div>

<div class="booking-management">
    <h2>Booking Table List</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration(Hour)</th>
                <th>Table</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>123A</td>
                <td>john_doe</td>
                <td>15/3/2024</td>
                <td>11:30AM</td>
                <td>2</td>
                <td>3</td>
                <td>
                    <button class="approve-btn" onclick="confirmApprove()">Approve</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
            <tr>
                <td>123B</td>
                <td>ali</td>
                <td>23/5/2024</td>
                <td>2:00PM</td>
                <td>3</td>
                <td>6</td>
                <td>
                    <button class="approve-btn" onclick="confirmApprove()">Approve</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
            
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

function confirmApprove() {
    confirm("Are you sure you want to approve this booking?");
}

function confirmDelete() {
    confirm("Are you sure you want to delete this user?");
}

function logout() {
    if(confirm("Are you sure you want to log out?")){
        window.location.href = "../index.php";
    }
}
</script>

</body>
</html>
