function validation(){
	const email=document.getElementById('email').value;
	if(email.indexOf('@')<=0){
			document.getElementById('em').innerHTML="****invalid @ position";
			return false;
		}
		 if((email.charAt(email.length-4)!='.')or(email.charAt(email.length-3)!='.')){
			document.getElementById('em').innerHTML="invalid . position";
			return false;
		}
	const pass=document.getElementById('password').value;
	if((pass.length<8)){
			document.getElementById('password1').innerHTML="****Minimum 8 charater required"
			return false;
		}s
	if((pass.length>17)){
			document.getElementById('password1').innerHTML="****Maximum 16 charater is required"
			return false;
		}
}