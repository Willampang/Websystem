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

            header("Location: payment.php");
            exit();
        }
        ?>
    
    <body>
        <div class="nav">
            <nav>
                <ul>
                    <li><a href="index.php"><img class="logo"src="image/Snookerlogo.png" alt="Logo"></a></li>        
                    <li><a href="index.php"><h4>Home</h4></li></a>
                    <li><a href="bookingstatus"><h4>Booking Status</h4></li></a>                                
                    <li><a href="payment.php"><h4>Payment</h4></li></a>
                    <li><a href="booking.php"><h4>Booking</h4></li></a>
                    <div class="right">
                        <div class="searchbar">
                            <form> 
                                <input type="search" placeholder="Seacrh an event u want">
                            </form>
                        </div>
                        <a class="login-link" href="#login">
                         <a href="login.php"><img class="login-icon" src="login.png" alt="Login"></a>
                        </a>
                    </div>             
                </ul>
            </nav>
        </div>

            <div class="reservation-form">
                <div class="left-container">

                        <div class="tablediv">
                            <img src="tables.png" class="tablepic">
                          </div>
                        
                    <div class="left-down-column2">
                        <details>
                            <summary>Opening Hour</summary>
                            <p class="policy"> Monday: 9:00 AM - 10:00 PM<br>
                                Tuesday: 9.00 AM - 10:00 PM<br>
                                Wednesday:9.00 AM - 10:00 PM<br>
                                Thursday: 9.00 AM - 10:00 PM<br>
                                Friday: 9.00 AM - 10:00 PM<br>
                                Saturday: 10.00 AM - 11:30 PM<br>
                                Sunday: 10.00 AM - 11:30PM
                            </p>
                        </details>
                      </div>
      
                      <div class="left-down-column2">
                      <details>
                            <summary>Price</summary>
                            <p class="policy">
                            1 hour: RM10<br>
                            2 hours: RM15</p>
                            </p>
                        </details>
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

                        <form action="payment.php" method="post">
                        <h3 class="policy">Select date and time for your reservation</h3>
                            <label>Date:</label>
                            <input type="date" id="date" name="date" placeholder="mm/dd/yyyy" required>
                            <label>Time:</label>
                            <input type="time" id="time" name="time" required>
                            <label>Duration:</label>
                            <input type="range" id="duration" name="duration" min="1" max="5" value="1" step="1" required> 
                            <output for="duration" id="durationOutput">1 hour</output>

                            <h3 class="policy">Please Select a Table</h3>
                            <div class="row">
                                <input  type="radio" id="option1" name="option" value="option1" required>
                                <label for="option1">Table 1</label>
                                <input type="radio" id="option2" name="option" value="option2">
                                <label for="option2">Table 2</label>
                                <input type="radio" id="option3" name="option" value="option3">
                                <label for="option3">Table 3</label>
                                <input type="radio" id="option4" name="option" value="option4">
                                <label for="option4">Table 4</label>
                            </div>
                            <div class="row">
                                <input type="radio" id="option5" name="option" value="option5">
                                <label for="option5">Table 5</label>
                                <input type="radio" id="option6" name="option" value="option6">
                                <label for="option6">Table 6</label>
                                <input type="radio" id="option7" name="option" value="option7">
                                <label for="option7">Table 7</label>
                                <input type="radio" id="option8" name="option" value="option8">
                                <label for="option8">Table 8</label>
                            </div>
                            
                            
                            <script>
                            const durationInput = document.getElementById('duration');
                            const output = document.getElementById('durationOutput');

                            durationInput.addEventListener('input', function() {
                                output.textContent = this.value + ' hour' ; 
                            });
                            </script>

                            <input id="submit" type="submit" name="submit" value="Check Availability">
                            <input id="back" type="button" value="< Back" onclick="window.location.href='index.php'">
                        </form>
                    </div>
                </div>
                
              </div>
        </div>
    </body>
</html>

