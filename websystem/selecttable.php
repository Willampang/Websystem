
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
          <link href="Home.css" rel="stylesheet" />
          <link href="booking.css" rel="stylesheet"/>
          <link href="selectablecss.css" rel="stylesheet" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Snooker Society</title>
    </head>
    
    <body>
    <div class="nav">
            <nav>
                <ul>
                    <li><a href="index.php"><img class="logo"src="image/Snookerlogo.png" alt="Logo"></a></li>        
                    <li><a href="index.php"><h4>Home</h4></li></a>
                    <li><a href="bookingstatus"><h4>Booking Status</h4></li></a>                                
                    <li><a href="event.php"><h4>Event Booking</h4></li></a>
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
        <div class="split left">
            <div class="tablediv">
              <img src="tables.png" class="tablepic">
            </div>
          </div>
          
          <div class="split right">
            <div class="checkbox-table" style="background-color: #353535;">
                <form class="radio-form">
                <h1 style="margin-top:150px;">Please Select a Table</h1>
                    <div class="row">
                        <input  type="radio" id="option1" name="option" value="option1">
                        <label style="color:white;" for="option1">Table 1</label>
                        <input type="radio" id="option2" name="option" value="option2">
                        <label style="color:white;" for="option2">Table 2</label>
                        <input type="radio" id="option3" name="option" value="option3">
                        <label style="color:white;" for="option3">Table 3</label>
                        <input type="radio" id="option4" name="option" value="option4">
                        <label style="color:white;" for="option4">Table 4</label>
                    </div>
                    <div class="row">
                        <input type="radio" id="option5" name="option" value="option5">
                        <label style="color:white;" for="option5">Table 5</label>
                        <input type="radio" id="option6" name="option" value="option6">
                        <label style="color:white;" for="option6">Table 6</label>
                        <input type="radio" id="option7" name="option" value="option7">
                        <label style="color:white;" for="option7">Table 7</label>
                        <input type="radio" id="option8" name="option" value="option8">
                        <label style="color:white;" for="option8">Table 8</label>
                    </div>
                </form>


                 <a href="payment.php"> <input style="color:white; font-size: 20px;" id="submit" type="submit" value="Proceed"></a>
            </div>
          </div>
        

    </body>
</html>
