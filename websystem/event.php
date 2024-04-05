<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <link href="Home.css" rel="stylesheet" />
    <link href="event.css" rel="stylesheet" />
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


        <table>
    <tr>
        <td>100</td>
        <td>2000</td>
        <td>0000</td>
        <td>2222</td>
    </tr>
</table>
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

<script>
    // Function to calculate total price when quantity changes
    function calculateTotal() {
        var total = 0;
        var quantityInputs = document.getElementsByClassName('quantityInput');
        var priceCells = document.getElementsByClassName('priceCell');
        for (var i = 0; i < quantityInputs.length; i++) {
            var quantity = parseInt(quantityInputs[i].value);
            var price = parseFloat(priceCells[i].textContent);
            total += quantity * price;
        }
        document.getElementById('totalCell').textContent = 'Total: RM ' + total.toFixed(2);
    }

    // Add event listeners to quantity inputs
    var quantityInputs = document.getElementsByClassName('quantityInput');
    for (var i = 0; i < quantityInputs.length; i++) {
        quantityInputs[i].addEventListener('input', calculateTotal);
    }
</script>

</body>
</html>
