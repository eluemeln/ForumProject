
function Login()
{
	var user = document.getElementById("Uname").value;
	var pass = document.getElementById("Pwd").value;
	
	if(!isNaN(user)|| (user==null))	
	{
		alert("username cannot be a number or numbers and not empty");
		
		
	}
	 
	
	
	if((pass==null)||(pass.length<=5))
	{
		
	
		
		alert("password must not be emty and shouldbe morethan 5 charcters");
	}
	
	



}
	
	
	
	
