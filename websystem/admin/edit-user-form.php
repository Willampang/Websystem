<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User Form</title>
  <link rel="stylesheet" href="edit-user-form.css">
</head>
<body>
  <div class="container">
    <h2>Edit User</h2>
    <form id="editUserForm" method="POST" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="user_id">User ID: 123A</label>
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>
      <div class="form-group">
        <button type="submit">Update User</button>
        <button type="button" onclick="window.location.href='admin.php';">Cancel</button>
      </div>
    </form>
  </div>
  <script src="user-form.js"></script>
</body>
</html>
