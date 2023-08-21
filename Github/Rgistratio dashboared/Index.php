<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Your Account</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
   
<link rel="stylesheet" href="style.css">

<script src="siginup.js" ></script>
<script src="login.js" ></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mangment System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
           <li><a href="#"  id="button"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
           <li><a href="#" id="btn14"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
          </ul>
        </div>
      </div>
    </nav>
    <div class="div2">
        <h1>Online Managment System</h1>
        <button id="btn3">Registration</button>
    </div>

    <div class="pppp">
      <form name="Form" action="new.php" onsubmit="return validateForm()" method="post">
            <div class="popup">
            <div class="close-btn" id="btn12">&times;</div>
    
            <h2 class="element">Sign Up</h2>

            <div class="element">
              <label for="show">Username</label>
              <input type="text"  id="name" placeholder="Full Name" name="username" autocomplete="off">
              <span id="username" class="text-danger"> </span>
            </div>
    
            <div class="element">
              <label for="show">Email</label>
              <input type="email"  id="email" placeholder="Email" name="email" autocomplete="off">
              <span id="emailaddress" class="text-danger "> </span>
            </div>
    
            <div class="element">
                <label for="show">Location</label>
                <input type="text"  id="Location" placeholder="Location" name="location" autocomplete="off">
                <span id="location" class="text-danger "> </span>
            </div>
                <div class="element">
                <label for="show">Password</label>
                <input type="password"  id="pwd" placeholder="Password" name="password" autocomplete="off">
                <span id="password" class="text-danger"> </span>
                </div>
    
                <div class="element">
                <label for="show">Confirm Password</label>
                <input type="password" id="cpwd" placeholder="Confirm Password" name="cpassword" autocomplete="off">
                <span id="cpassword" class="text-danger"> </span>
               </div>
               
            <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit" value="submit">Submit</button>
            <div class="element">
                 <a href="#">Forget Password</a>
        </div>
        </div>
          </form>

      </div>
    </div>
    </div>
  

<div class="pppp2">
  <form name="loginForm" action="new.php" onsubmit="return validate()" method="post">
        <div class="popup">
        <div class="close-btn" id="btn13">&times;</div>
        <h2 class="element">Login us</h2>
        <div class="element">
          <label for="show">Email</label>
          <input type="email" placeholder="Email" autocomplete="off" name="email">
          <span id="emaillogin"> </span>
        </div>
            <div class="element">
            <label for="show">Password</label>
            <input type="password" placeholder="Password" autocomplete="off" name="pass">
            <span id="passwordlogin"> </span>
            </div>        
        <button type="submit" class="btn btn-primary btn-block" value="submit" name="submit">Login</button>
        <div class="element">
             <a href="#">Forget Password</a>
    </div>
    </div>
      </form>
  </div>
</div>
</div>

<script>
    document.getElementById("btn14").addEventListener("click", function(){
        document.querySelector(".pppp2").style.display="block";
    });
    document.getElementById("button").addEventListener("click", function(){
        document.querySelector(".pppp").style.display="block";
    });
    document.getElementById("btn3").addEventListener("click", function(){
        document.querySelector(".pppp").style.display="block";
    });
</script>
<script>
     document.getElementById("button").addEventListener("click", function(){
        document.querySelector(".pppp2").style.display="none";
    });
    document.getElementById("btn14").addEventListener("click", function(){
        document.querySelector(".pppp").style.display="none";
    });
</script>
<script>
        document.getElementById("btn12").addEventListener("click", function(){
        document.querySelector(".pppp").style.display="none";
    });
    document.getElementById("btn13").addEventListener("click", function(){
        document.querySelector(".pppp2").style.display="none";
    });
</script>
</body>
</html>