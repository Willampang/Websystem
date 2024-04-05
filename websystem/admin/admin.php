<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="admin-skeleton.css">
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

    <div class="filter-search">
        <input type="text" id="searchInput" placeholder="Search for users...">
        <select id="roleFilter">
            <option value="all">All Roles</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <button>Filter</button>
    </div>

    <div class="user-management">
    <h2>User List</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>123A</td>
                <td>john_doe</td>
                <td>john@example.com</td>
                <td>123456</td>
                <td>Admin</td>
                <td>
                    <button class="edit-btn" onclick="window.location.href='edit-user-form.php';">Edit</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
            <tr>
                <td>123B</td>
                <td>ali_james</td>
                <td>ali123@example.com</td>
                <td>ali123</td>
                <td>User</td>
                <td>
                    <button class="edit-btn" onclick="window.location.href='edit-user-form.php';">Edit</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

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
