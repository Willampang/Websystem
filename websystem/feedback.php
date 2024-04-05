<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link href="Home.css" rel="stylesheet" />
    <link href="feedback.css" rel="stylesheet"/>
</head>
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
<div class="box">
    <img src="image/Snookerlogo.png" alt="Logo">
    <h2>Your Feedback</h2>
    <hr>
    <h5>We would like your feedback to improve our website and society</h5>
    <div class="rating">
        <input type="radio" id="star5" name="rating" value="5" />
        <label for="star5">☆</label>
        <input type="radio" id="star4" name="rating" value="4" />
        <label for="star4">☆</label>
        <input type="radio" id="star3" name="rating" value="3" />
        <label for="star3">☆</label>
        <input type="radio" id="star2" name="rating" value="2" />
        <label for="star2">☆</label>
        <input type="radio" id="star1" name="rating" value="1" />
        <label for="star1">☆</label>
      </div>

      <div class="details">
        <p>Name</p>
        <input type="text" class="input" id="customer_name" placeholder="Enter Your Name" required/>
    </div>

    <div class="details">
        <p>Feedback</p>
        <textarea class="input" id="feedback-comment" placeholder="Give Us Your Feedback" required></textarea>
    </div>

    <div>
        <button type="button" class="post" onclick="submitOrder()">Post Comment</button>
    </div>
</div>
   

<script>
    const stars = document.querySelectorAll('.rating input');
const ratingDisplay = document.querySelector('.rating-display');

stars.forEach(star => {
  star.addEventListener('click', function() {
    ratingDisplay.textContent = `You rated ${this.value} stars.`;
  });
});


function submitOrder() {
    var name = document.getElementById("customer_name").value;
    var sumbit=document.getElementsByClassName("post").value;

    if (name === "") {
        alert("Please enter your name");
    } 
    else {
        alert(name + ",your feedback has been sent.Thank You!"); 
        window.location.reload();
    }
}


</script>






<footer>
<img src="image/SnookerLogo.png" alt="Logo">
<!--<div class="social">
<img src="icons/facebook.png">
<img src="icons/social.png">
</div>-->
<nav>
    <ul>   
        <li><a href="index.php"><h4>Home</h4></li></a>
        <li><a href="bookingstatus"><h4>Booking Status</h4></li></a>                                
        <li><a href="event.php"><h4>Event Booking</h4></li></a>
        <li><a href="web.php"><h4>Booking</h4></li></a>
        <li><a href="feedback.php"><h4>Feedback</h4></li></a>
        <li><a href="faq.php"><h4>FAQ</h4></a></li>
    </ul>
</nav>
</footer>





</body>



</html>