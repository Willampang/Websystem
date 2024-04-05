<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modify Booking</title>
    <link rel="stylesheet" href="modifybooking.css">
    <link rel="stylesheet" href="Home.css">
</head>
<body>

<div class="nav">
    <nav>
        <ul>
            <li><a href="index.php"><img class="logo" src="image/Snookerlogo.png" alt="Logo"></a></li>        
            <li><a href="index.php"><h4>HOME</h4></a></li>
            <li><a href="bookingstatus.php"><h4>BOOKING STATUS</h4></a></li>                                
            <li><a href="payment.php"><h4>PAYMENT</h4></a></li>
            <li><a href="web.php"><h4>BOOKING</h4></a></li>

            <div class="right">
                <div class="searchbar">
                    <form> 
                        <input type="search" placeholder="Search an event you want">
                    </form>
                </div>
                <a class="login-link" href="#login">
                    <a href="login.php"><img class="login-icon" src="login.png" alt="Login"></a>
                </a>
            </div>      
        </ul>
    </nav>        
</div>

<div class="container">
    <h1 style="color: black">Modify Booking</h1>
    <div class="booking-details">
        <p style="color: black"> <strong>Your ID:</strong> 123A</p>
        <form id="modifyForm" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="range" id="duration" name="duration" min="1" max="5" value="1" step="1" required> 
                <output for="duration" id="durationOutput">1 hour</output>

                <script>    
                            const durationInput = document.getElementById('duration');
                            const output = document.getElementById('durationOutput');

                            durationInput.addEventListener('input', function() {
                                output.textContent = this.value + ' hour' ; 
                            });
                </script>
                
                <input type="submit" value="Modify Booking">
            <button onclick="goBack()">Back</button>
            </div>


        </form>
    </div>
</div>


<script>
    function goBack() {
        window.location.href = "bookingstatus.php";
    }

    function validateForm() {
    var form = document.getElementById("modifyForm");
    if (form.checkValidity()) {
        if (confirm("Are you sure you want to MODIFY your booking?")) {
            window.location.href = "bookingstatus.php"; 
            alert("Booking Modified!");
        }
        return true;
    } else {
        return false;
    }
}
</script>

</body>
</html>
