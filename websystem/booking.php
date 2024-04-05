
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
          <link href="booking.css" rel="stylesheet" />
          <link href="Home.css" rel="stylesheet" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Snooker Society</title>
    </head>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $date = $_POST['date'];
            $time = $_POST['time'];
            $people = $_POST['people'];

            header("Location: selecttable.html");
            exit();
        }
        ?>
    
    <body>

    <div class="nav">
            <nav>
                <ul>
                    <li><a href="index.php"><img class="logo"src="image/Snookerlogo.png" alt="Logo"></a></li>        
                    <li><a href="index.php"><h4>Home</h4></li></a>
                    <li><a href="bookingstatus.php"><h4>Booking Status</h4></li></a>                                
                    <li><a href="event.php"><h4>Event Booking</h4></li></a>
                    <li><a href="booking.php"><h4>Booking</h4></li></a>

                    <div class="right">
                        <div class="searchbar">
                            <form> 
                                <input type="search" placeholder="Seacrh an event u want">
                            </form>
                        </div>
                        <a class="login-link" href="#login">
                         <a href="login-user.php"><img class="login-icon" src="login.png" alt="Login"></a>
                        </a>
                    </div>      
                </ul>
            </nav>        
        </div>

            <div class="reservation-form">
                <div class="left-container">
                    <div class="left-up-column">
                        <label for="operation">Opening Hour:</label>
                        <p class="policy"> Monday: 9:00 AM - 10:00 PM<br>
                            Tuesday: 9.00 AM - 10:00 PM<br>
                            Wednesday:9.00 AM - 10:00 PM<br>
                            Thursday: 9.00 AM - 10:00 PM<br>
                            Friday: 9.00 AM - 10:00 PM<br>
                            Saturday: 10.00 AM - 11:30 PM<br>
                            Sunday: 10.00 AM - 11:30PM
                        </p>
      
                      </div>
      
                      <div class="left-down-column">
                          <label for="price">Pricing</label>
                        <p class="policy">1 hour: RM10<br>
                            2 hours: RM15</p>
                      </div>

                      <div class="left-down-column2">
                        <details>
                            <summary>Policy</summary>
                            <p class="policy">
                            Late Arrival Policy:<br><br>
                            Customers who arrive more than 15 minutes after their scheduled appointment time may be subject to a 50% surcharge on their service fee. <br><br>
                            This surcharge is to accommodate for the inconvenience caused to other scheduled appointments and ensure smooth operation of our services. <br><br>
                            We appreciate your understanding and cooperation.
                            </p>
                        </details>
                    </div>
                </div>

                <div class="right-container">
                    <div class="right-column">

                        <form action="selecttable.php" method="post">
                        <h3 class="policy">Select date and time for your reservation</h3>
                            <label>Date:</label>
                            <input type="date" id="date" name="date" placeholder="mm/dd/yyyy" required>
                            <label>Time:</label>
                            <input type="time" id="time" name="time" required>
                            <label>Duration:</label>
                            <input type="range" id="duration" name="duration" min="1" max="5" value="1" step="1" required> 
                            <output for="duration" id="durationOutput">1 hour</output>
                            <script>    
                            const durationInput = document.getElementById('duration');
                            const output = document.getElementById('durationOutput');

                            durationInput.addEventListener('input', function() {
                                output.textContent = this.value + ' hour' ; 
                            });
                            </script>

                            <input id="submit" type="submit" name="submit" value="Check Availability">
                        </form>
                    </div>
                </div>
                
              </div>
        </div>
    </body>
</html>