function validateForm() {
    var user = document.forms["Form"]["username"].value;
    var email = document.forms["Form"]["email"].value;
    var location = document.forms["Form"]["location"].value;
    var password = document.forms["Form"]["password"].value;
    var cpassword = document.forms["Form"]["cpassword"].value;

    if (user == "") {
      document.getElementById("username").innerHTML="Enter Your Username(Exm:Hasnain Ali)";
      return false;
    }
    if (email == "") {
      document.getElementById("emailaddress").innerHTML="Enter Your email (Exm:dummy123@gmail.com)";
      return false;
    }
    if (location == "") {
      document.getElementById("location").innerHTML="Enter Your location";
      return false;
    }
    if (password == "") {
      document.getElementById("password").innerHTML="Enter your password";
      return false;
    }
    if (cpassword == "") {
      document.getElementById("cpassword").innerHTML="Enter your Confirm Password";
      return false;
    }
    if(password != cpassword){
        document.getElementById("password").innerHTML="Password are not match";
        return false;
    }
  }


