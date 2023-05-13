let w=document.getElementById('logreg');
let x=document.getElementById('btn');
let y=document.getElementById('lid');
let z=document.getElementById('rid');
let a=document.getElementById('rlid');
let b=document.getElementById('rrid');
function register() {
x.style.left='80px';
y.style.left='-400px';
z.style.left='20px';
a.style.top='600px';
b.style.top='600px';
w.style.height='530px';
y.style.display='hidden';
a.style.display='hidden';
b.style.display='hidden';
// w.style.backgroundColor='pink';
}
function login() {
x.style.left='0px';
y.style.left='20px';
z.style.left='400px';
a.style.top='600px';
b.style.top='600px';
w.style.height='340px';
y.style.display='';
a.style.display='';
b.style.display='';
}
function lgn() {
x.style.left='0px';
y.style.left='-400px';
z.style.left='400px';
a.style.top='80px';
b.style.top='600px';
w.style.height='340px';
}
function rgst() {
x.style.left='80px';
y.style.left='-400px';
z.style.left='400px';
a.style.top='600px';
b.style.top='80px';
w.style.height='530px';
}



function validation(){
	const email=document.getElementById('lemail').value;
	if(email.indexOf('@')<=0){
			document.getElementById('lem').innerHTML="****invalid @ position";
			return false;
		}else{
			document.getElementById('lem').innerHTML="";
		}
		 if((email.charAt(email.length-4)!='.')&&(email.charAt(email.length-3)!='.')){
			document.getElementById('lem').innerHTML="****invalid . position";
			return false;
		}else{
			document.getElementById('lem').innerHTML="";
		}
	const pass=document.getElementById('lpass').value;
	if((pass.length<8)||(pass.length>16)){
			document.getElementById('lpassm').innerHTML="****Password must be in between 8 or 16 charater";
			return false;
		}else{
			document.getElementById('lpassm').innerHTML="";
		}


	// const remail=document.getElementById('relemail').value;
	// if(remail.indexOf('@')<=0){
	// 		document.getElementById('relem').innerHTML="****invalid @ position";
	// 		return false;
	// 	}else{
	// 		document.getElementById('relem').innerHTML="";
	// 	}
	// 	 if((remail.charAt(remail.length-4)!='.')&&(remail.charAt(remail.length-3)!='.')){
	// 		document.getElementById('relem').innerHTML="****invalid . position";
	// 		return false;
	// 	}else{
	// 		document.getElementById('relem').innerHTML="";
	// 	}



	// const fname=document.getElementById('fn').value;
	// 	if((fname.length<3)||(fname.length>22)){
	// 		document.getElementById('fnm').innerHTML="Length of the name should be in betwwen 1 and 50"
	// 		return false;
	// 	}
	// const lname=document.getElementById('ln').value;
	// 	if((lname.length<3)||(lname.length>22)){
	// 		document.getElementById('lnm').innerHTML="Length of the name should be in betwwen 1 and 50"
	// 		return false;
	// 	}
	// 	const add=document.getElementById('add').value;
	// 	if((add.length<3)||(add.length>22)){
	// 		document.getElementById('addm').innerHTML="Length of the name should be in betwwen 1 and 50"
	// 		return false;
	// 	}
}