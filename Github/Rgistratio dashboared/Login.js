function validate() {
    
      var email = document.forms["loginForm"]["email"].value;
      var password = document.forms["loginForm"]["pass"].value;
      if (email == "") {
        document.getElementById("emaillogin").innerHTML="Enter valid Email";
        return false;
      }
      if (password == "") {
        document.getElementById("passwordlogin").innerHTML="Enter valid password";
        return false;
      }
    }
    