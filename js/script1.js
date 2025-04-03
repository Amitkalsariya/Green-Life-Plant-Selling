function validateForm() {
 
    var user = document.getElementById('f_name').value;
    var pno = document.getElementById('no').value;
    var emailaddress = document.getElementById('email').value;
    var pas = document.getElementById('password').value;

    if (user == "") {
        document.getElementById("username").innerHTML=("Please enter name field");
        return false;
    }
    else if(!isNaN(user)){
        document.getElementById("username").innerHTML=("only character are allowed");
        return false;
    }
    
    if (pno == "") {
        document.getElementById("Phone").innerHTML=("Please enter phone number field");
        return false;
    }
    else if(isNaN(pno)){
        document.getElementById("Phone").innerHTML=("Must write digits only");
        return false;
    }
    else if(pno.length != 10){
        document.getElementById("Phone").innerHTML=("Phone number must be 10 digits");
        return false;
    }

    else if (emailaddress == "") {
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