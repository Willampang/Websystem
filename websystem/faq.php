<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
          <link href="Home.css" rel="stylesheet" />
          <link rel="stylesheet" href="faq.css">
        <title>Snooker Society</title>
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


<div class="faq">
   
<h1>FAQ'S Question</h1>
    <h3 class="open-ans">1.What is a snooker society?</h3>
    
    <p class="answer">A snooker society is a group of individuals who share a common interest in playing snooker. They often organize events,
    tournaments, and social 
    gatherings centered around the game.</p>

    <h3 class="open-ans">2.How can i join the snooker society?</h3>

    <p class="answer">To join our snooker society, simply reach out to our membership coordinator or visit our website to fill out 
    a membership application
    form. Membership is open to anyone interested in playing snooker, regardless of skill level.</p>

    <h3 class="open-ans">3.Do I need to be an experienced player to join?</h3>

    <p class="answer">No, our snooker society welcomes players of all skill levels, from beginners to experienced players. 
    Our focus is on fostering a friendly and supportive environment for everyone to enjoy the game.
</p>

<h3 class="open-ans">4.What events and activities does the snooker society organize?</h3>

<p class="answer">We organize a variety of events and activities, including regular club nights for casual play, friendly tournaments, 
    coaching sessions, and social gatherings such as dinners or outings.</p>
    <h3 class="open-ans">5.Are there any membership fees?</h3>

    <p class="answer">Yes, there is usually an annual membership fee to cover the costs of running the society, 
        maintaining equipment, and organizing events. 
        The fee amount can vary and will be outlined in the membership application materials.</p>

        <h3 class="open-ans">6.Do I need to bring my own equipment to play?</h3>

        <p class="answer">While members are welcome to bring their own cues and accessories, the snooker society provides cues, chalk, and other necessary 
    equipment for use during club events and activities.</p>

 <h3 class="open-ans">7.Can I book a table in advance?</h3>

 <p class="answer">Yes, members can usually book tables in advance for certain events or during designated club hours. 
        Information on how to book a table will be provided upon joining the society.</p>
        
        <h3 class="open-ans">8.Are there opportunities for competitive play within the society?</h3>

        <p class="answer">Yes, we organize friendly tournaments and leagues for members who wish to compete in a more structured setting. 
            These events are a great way to test your skills and meet fellow players.</p>

     <h3 class="open-ans">9.Is coaching available for members looking to improve their game?</h3>

     <p class="answer">Yes, we often offer coaching sessions led by experienced players or certified coaches. These sessions provide valuable instruction and 
    tips to help members enhance their snooker skills.</p>

    <h3 class="open-ans">10.How can I stay updated on upcoming events and news from the snooker society?</h3>

    <p class="answer">Members will receive regular communications via email or through our website regarding upcoming events, news, and other important announcements. 
        We also encourage members to follow us on social media for updates.</p>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    var questions = document.querySelectorAll('.faq .open-ans');

    questions.forEach(function(question) {
        question.addEventListener('click', function() {
            this.classList.toggle('active');
        });
    });
});

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
