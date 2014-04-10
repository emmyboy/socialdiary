  
  function make_blank(oInput) {
    if (oInput.value == 'placeholder') {
        oInput.value = '';
    }
}

 
  function Validate()  // Validates all the fields entered while signing up
{
    var p=document.forms["registeredblock"]["FirstName"].value;
	var q=document.forms["registeredblock"]["LastName"].value;
	var r=document.forms["registeredblock"]["Email"].value;
	var s=document.forms["registeredblock"]["Password"].value;
	var t=document.forms["registeredblock"]["DOB"].value;
	var genderchosen = "";
    //var len = document.registeredblock.gender.length;
	
		
		if(document.getElementById){
			if (document.getElementById('genderRadioFemale').checked){
				genderchosen = "2";
				}
			else{
				genderchosen = "1";
				}
			}

			//document.write(genderchosen);
		
	                   //Checks for empty fields
	      if (p==null || p==""|| q==null || q==""||r==null || r==""||s==null || s=="" || genderchosen==null || genderchosen==""|| t=="" ||t==null)
             {
              alert("All the Fields should be filled up to Register!!");
			  return false;
			  }
			  else
			  {
			  
			   $.post("signup.php",
				{'FirstName':p,'LastName':q,'Email':r,'Password':s,'DOB':t,'GenderChosen':genderchosen}, 
				function(data) {	
				
					if (data=="success")
					{                          // Redirects to the Login page once successfully signed in
					   //alert('You have been successfully signed up! Please sign in with the your credentials');
					   window.location.href = 'Userlogin.html';
					}
					else 
					{
					  alert('Sorry! Could not sign up!');
					}
					
				}
			   );
		      }
}



