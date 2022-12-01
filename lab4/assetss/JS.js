
function checkToggle(){
	var navItem = document.querySelector('nav');

	var x = window.matchMedia("(max-width: 720px)")
	myFunction(x) // Call listener function at run time
	x.addListener(myFunction) //Atașați funcția de ascultător la schimbările de stare

	function myFunction(x) {
		if(navItem.style.display=='none'){

			navItem.style.display='block';
		}else{
			navItem.style.display='none';	
		}
	}
}

function checkForm() {
	var username = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var password_1 = document.getElementById('password_1').value;
	var h2 = document.getElementById('title2');
	var fail = "";
	if(email == "" || password == ""|| password_1 == "")
		fail = "Not all data is entered";
	else if(username.split('@').length - 1 == 0 || username.split('.').length - 1 == 0)
		fail = "Email is wrong";
	else if(password != password_1)
		fail = "The password is not the same";
		
	if(fail != "") { // Daca nu sa gasit nici o greseala
		alert(fail);
	} else {
		// Curatim input
		document.getElementById('email').value = "";
		document.getElementById('password').value = "";
		document.getElementById('password_1').value = "";
		h2.style.display= 'block';
	}
}





// Timer
function displayDataTime() {

	const timer = new Date();
  
	let hours = timer.getHours();
	let minutes = timer.getMinutes();
	let seconds = timer.getSeconds();
  
	hours = (hours > 24) ? hours - 24 : hours;
  
	hours = ("0" + hours).slice(-2);
	minutes = ("0" + minutes).slice(-2);
	seconds = ("0" + seconds).slice(-2);
  
	document.getElementById('timer').textContent = 
	  hours + " : " + minutes + " : " + seconds;
  
	setTimeout(displayDataTime, 500);
  }
  
  displayDataTime();