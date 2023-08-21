<?php
session_start(); // Don't forget the semicolon

// Include the Main.php file
require 'Main.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H-faucet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <style>
        body {
            margin:0;
            padding:0;
            background-image: url(sports.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position:center;
            background-attachment:fixed;
            height:100vh;
            width: 100%;

        }
        @media (max-width: 767px) {
            .left-ad {
                display: none;
            }

            .bottom-ad {
                display: none;
            }

            .container-fluid {
                padding-left: 15px;
                padding-right: 15px;
            }

            .Claim_10Minute {
                width: 100%;
                max-width: 100%;
                padding-left: 10px;
                padding-right: 10px;
                margin-left: auto;
                margin-right: auto;
                text-align: center;

            }

            #referralInput {
                width: 100%;
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand navbar-light fixed-top" style="background-color:#e9ebea; padding: 15px; ">
        <a class="navbar-brand" href="#" style="font-weight: bold; font-size: 21px; padding-left: 25px;">
            <span style="color: rgb(255, 0, 0);"><i class="fa-sharp fa-solid fa-heart" style="color: #e70835;"></i> H</span>-Faucet | <span style="color: orange;">Btc</span>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="nav justify-content-end">
            <li class="nav-item">
        <a class="nav-link" href="#" style="color: White; background-color: orange; font-weight: bold; font-size: 13px; border:2px solid white;">
            <i class="fa-solid fa-gift"></i> Amount | <span class="BTC-Color" style="color: black;">
                <?php echo $faucetpaybalance; ?> satoshi
            </span>
        </a>
    </li>
            </ul>
        </div>
    </nav>

    <!--Left and Right Advertisement Banner-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="text-align: center; width: auto; height: auto; padding-top: 80px;">
                Top Ad
            </div>
            <div class="col-12" style="text-align: center; width: auto; height: auto; padding-top: 30px;">
                Top Ad
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-4 left-ad" style="text-align: left;">
                left
            </div>
            <div class="col-12 col-lg-4" style="text-align: center; ">
                <!-- Display errors using $_SESSION inside the <p> tag -->
                <?php if (isset($_SESSION['error'])): ?>
                <p style="background-color:red; padding: 10px;"><?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <p class="Claim_10Minute" style="background-color: #fdba02; padding: 14px; color: whitesmoke; font-weight: bold;">
                    Claim 1 to 10 Satoshi in Every 10 Minute
                </p>
                <p class="Claim_10Minute" style="background-color: #f54d77; border:2px dotted white; padding: 14px; color: whitesmoke; font-weight: bold;">
                    Faucet Requires a <a href="#">Faucetpay</a> Btc Address
                </p>
                <!--Form For Payment Input and Referral Link-->
                <form action="#" method="post" class="form-center">
                <input type="text" class="form-control" name="address" id="btcAddress" oninput="updateReferralLink()" placeholder="Enter Faucetpay BTC Address"
                        style="text-align: center; border: 2px solid red; padding:20px; border-radius:0px; outline:none; background-color: none; color: rgb(255, 255, 255); font-weight: lighter; background: none;">
                    <h1 id="timer"><?php echo isset(  $timerScript) ?   $timerScript : ''; ?></h1>
                    <div class="row">
                        <div class="col-6">
                            Cntdc
                        </div>
                        <div class="col-6">
                            saskbc
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#claimModal">claim Now
                        <i class="fa-solid fa-circle-arrow-right" style="color: #04ff00;"></i>
                    </button>
                    <!--Modal of Captcha and Advertisement-->
                    <div class="modal fade" id="claimModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" style="font-weight: bold;"><span style="color: rgb(255, 0, 0);">H</span>-Faucet |
                                        <span style="color: orange;">Captcha</span> </h3>
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            style="color: rgb(0, 255, 85); font-weight: bold;">&times;</span></button>
                                </div>
                                <div class="modal-body" style="text-align: center;">
                                    <div>
                                        <center>
                                            TOP ADS
                                        </center>
                                    </div>
                                    <div id="hCaptcha" class="captcha-container">
                                        <!-- Add the hCaptcha widget here -->
                                        <div class="h-captcha" data-sitekey="<?php echo $sitekey; ?>"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            Ad Bottom
                                        </div>
                                        <div class="col-6">
                                            Ad Bottom
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fa-solid fa-gift"></i> Claim Reward</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
            <div class="col-4 bottom-ad" style="text-align: right;">
                Bottom
            </div>
            <div style="background-color: rgb(235, 68, 68); width: 100%; padding: 80px 40px; text-align: center; font-weight: lighter; font-size: 25px;">
                <i class="fa-solid fa-gear" style="color: #fff; font-size: 27px;"></i>
                <br>
                <br>
                <h4 style="color: #fff; font-size: 25px; font-weight: bold;">Earn 30% By Referral</h4>
                <br>
                <div class="referral-section">
                    <input type="text" class="form-control" id="referralCode" readonly value="/ref/your_address" style="text-align: center; padding: 0px 30px;" />
                </div>
            </div>
            <div class="container-fluid" style="text-align: center; font-weight: lighter; color: #000; padding: 25px; background-color: rgb(189, 231, 217);">
                <h2>H - Faucet</h2>
                <hr>
                <p>
                    <i>A faucet is a website or application that distributes small amounts of cryptocurrency, such as Bitcoin (BTC), to users for free. In the context of Bitcoin, these small amounts are called Satoshis. These actions can include solving captchas, viewing advertisements, or completing simple tasks. While the amount of Bitcoin received from a faucet is very small (often ranging from a few Satoshis to a few hundred Satoshis), over time, users can accumulate more Satoshis by consistently using multiple faucets. Faucets serve as a means for people to learn about Bitcoin and experiment with it without investing any money.</i>
                </p>
            </div>
            <div class="jumbotron bg-info" style="width: 100%; text-align: center; margin: 0; border-radius: 0;">
                <h3 style="color: #fff; font-weight: bold;">SPECIAL OFFER</h3>
                <p>If you are interested in purchasing this script, please contact us on Telegram.</p>
            </div>
            <div class="container-fluid" style="background-color: #1078a1;text-align: center;">
                <img src="" alt="">
                <hr>
                <div>
                    <center>
                        <h4 style="text-align: center; color: #fff;">GET IN TOUCH</h5>
                        <div class="social" style="padding: 10px;">
                            <a href="#" style="padding: 10px; color: #0698fa; font-size: 25px;"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" style="padding: 10px; color: #00acee; font-size: 25px;"><i class="fa-brands fa-square-twitter"></i></a>
                            <a href="#" style="padding: 10px; color: #229ED9; font-size: 25px;"><i class="fa-brands fa-telegram"></i></a>
                        </div>
                </div>
                <hr>
                <p style="text-align: center; background-color: #c7c7c6; width: 100%; padding: 25px; color: white;">
                    <i>&copy; <?php echo date("Y"); ?> https://h-faucetbtc.com/ | BTC .All Right Reserved.</i>
                </p>
            </div>
        </div>
    </div>
    <script>
        // Get the input field and referral code element
        var addressInput = document.getElementById('address');
        var referralCodeInput = document.getElementById('referralCode');
        
        // Add an event listener to the address input field
        addressInput.addEventListener('input', generateReferralCode);
        
        // Function to generate the referral code
        function generateReferralCode() {
            var address = addressInput.value;
            var referralCode = 'https://h-faucetbtc.000webhostapp.com//ref/' + address;
            referralCodeInput.value = referralCode;
        }
    </script>
   <script>
        // Load saved address from cookie
        var savedAddress = getCookie('btcAddress');
        if (savedAddress) {
            document.getElementById('btcAddress').value = savedAddress;
        }

        <?php if (isset($_SESSION['timer_active'])): ?>
        // Hide input field and button
        document.getElementById('btcAddress').style.display = 'none';
        document.querySelector('button[name="submit"]').style.display = 'none';

        // Display timer
        var timerContainer = document.createElement('div');
        timerContainer.innerHTML = `
        <h1 id="timer">Timer: 10:00</h1>
        <script>
            function startTimer() {
                var duration = 600; // 10 minutes in seconds
                var timerElement = document.getElementById("timer");
                var intervalId = setInterval(updateTimer, 1000);

                function updateTimer() {
                    var minutes = Math.floor(duration / 60);
                    var seconds = duration % 60;

                    timerElement.textContent = "Timer: " + minutes + ":" + seconds;

                    if (duration <= 0) {
                        clearInterval(intervalId);
                        timerElement.textContent = "Timer finished!";
                    } else {
                        duration--;
                    }
                }
            }

            startTimer();
        </script>
        `;
        document.body.appendChild(timerContainer);

        // Show input field and button after timer completes
        setTimeout(function () {
            document.getElementById('btcAddress').style.display = 'block';
            document.querySelector('button[name="submit"]').style.display = 'block';
            document.querySelector('#timer').textContent = 'Timer finished!';
            eraseCookie('btcAddress'); // Remove saved address cookie
        }, 600000); // 600 * 1000 milliseconds

        // Remove session variables
        // ...
        <?php endif; ?>

        // Cookie functions
        function setCookie(name, value, days) {
            var expires = '';
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = '; expires=' + date.toUTCString();
            }
            document.cookie = name + '=' + (value || '') + expires + '; path=/';
        }

        function getCookie(name) {
            var nameEQ = name + '=';
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';  
        }
    </script>
</body>
</html>