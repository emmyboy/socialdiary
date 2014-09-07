  
function make_blank(oInput) {
    if (oInput.value == 'placeholder') {
        oInput.value = '';
    }
}

function Validate()  // Validates all the fields entered while signing up
{
	var p=document.forms["registeredblock"]["UserName"].value;
	var r=document.forms["registeredblock"]["Email"].value;
	var s=document.forms["registeredblock"]["Password"].value;
    //var len = document.registeredblock.gender.length;
	
	if (p==null || p=="" || r==null || r=="" || s==null || s=="") {
		alert("All fields should be filled in to Register!!");
		return false;
	}
	else {
		$.post("signup.php",
			{'UserName':p,'Email':r,'Password':s}, 
			function(data) {	
				if (data=="success")
				{       // Redirects to the Login page once successfully signed in
					//window.location.href = 'Userlogin.html';
					window.location.href = 'register.html';
				}
				else 
				{
					alert('Sorry! Could not sign up!');
				}
				
			}
		);
	}
}

