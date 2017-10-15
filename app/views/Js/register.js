  
  //define variables for inputs
  var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;
  var email = document.getElementById('email').value;
  var phone = document.getElementById('phone').value;
  var city = document.getElementById('city').value;
  var streetnum = document.getElementById('streetnum').value;
  var streetname = document.getElementById('streetname').value;
  var province = document.getElementById('province').value;
  var country = document.getElementById('country').value;
  var postalcode = document.getElementById('postalcode').value;

  //Define pattern recognition variables 
  var namepatt = /^[a-z]+$/i;    
  var emailpatt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var phonepatt = /^(([0-9]{10}))$/;

  function validate_email(){
      
      if(!emailpatt.test(email))
      { 
          document.getElementById("emailalert").className = "alert alert-danger";    
          document.getElementById("emailalertstrong").innerHTML = "Please enter a valid email.";
      }
      else{
          document.getElementById("emailalert").className = "alert alert-success";    
          document.getElementById("emailalertstrong").innerHTML = "&#x2713 verified";
          
      }
  }    

function validate_fname(){
      
      if(!namepatt.test(fname))
      { 
          document.getElementById("fnamealert").className = "alert alert-danger";    
          document.getElementById("fnamealertstrong").innerHTML = "Please enter a valid name.";
      }
      else{
          document.getElementById("fnamealert").className = "alert alert-success";    
          document.getElementById("fnamealertstrong").innerHTML = "&#x2713 verified";
          
      }
  }    