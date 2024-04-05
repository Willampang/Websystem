function validateForm() {
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var confirm_password = document.getElementById("confirm_password").value;

  if (!username || !email || !password || !confirm_password) {
    alert("Please fill in all required fields.");
    return false;
  }

  alert("User updated successfully!");
  window.location.href = "admin.php";
  return true;
}
