function validateForm() {
 
    var emailaddress = document.getElementById('email').value;
    var pas = document.getElementById('password').value;

   
    if (emailaddress == "") {
        document.getElementById("emailadd").innerHTML=("Please enter email address field");
        return false;
    }
    else if(emailaddress.indexOf('@') <= 0){
        document.getElementById("emailadd").innerHTML=("Invalid email");
        return false;
    }
    else if((emailaddress.charAt(emailaddress.length-4) != '.' ) && (emailaddress.charAt(emailaddress.length-3) != '.' )){
        document.getElementById("emailadd").innerHTML=("Invalid email");
        return false;
    }


    else if (pas == "") {
      document.getElementById("pass").innerHTML=("Please enter password field");
      return false;
    }
    else if((pas.length < 1 ) || (pas.length >  15)){
        document.getElementById("pass").innerHTML=("password must be 8 digitis");
        return false;
    }    

}