//modal
var modal=document.getElementById('modal');
window.onclick=function(event) {
    if (event.target==modal) {
        modal.style.display="none";
    }
}



//blogs
function blog1() {
				xhttp=new XMLHttpRequest();
				xhttp.onreadystatechange=function() {
					if (xhttp.readyState==4 && xhttp.status==200)
						document.getElementById('read-div1').innerHTML=xhttp.responseText;
				}
				xhttp.open('GET', 'blog1.html', true);
				xhttp.send();
}
function blog2() {
				xhttp=new XMLHttpRequest();
				xhttp.onreadystatechange=function() {
					if (xhttp.readyState==4 && xhttp.status==200)
						document.getElementById('read-div1').innerHTML=xhttp.responseText;
				}
				xhttp.open('GET', 'blog1.html', true);
				xhttp.send();
}
function blog3() {
				xhttp=new XMLHttpRequest();
				xhttp.onreadystatechange=function() {
					if (xhttp.readyState==4 && xhttp.status==200)
						document.getElementById('read-div1').innerHTML=xhttp.responseText;
				}
				xhttp.open('GET', 'blog1.html', true);
				xhttp.send();
}
function blog4() {
				xhttp=new XMLHttpRequest();
				xhttp.onreadystatechange=function() {
					if (xhttp.readyState==4 && xhttp.status==200)
						document.getElementById('read-div1').innerHTML=xhttp.responseText;
				}
				xhttp.open('GET', 'blog1.html', true);
				xhttp.send();
}
//remove read more
$(document).ready(function() {
	$('#read-more1').on('click', function() {
		$('#read-more1').remove();
	});
});



//slide pictures
var count=0; 
function slidePictures() { 
var arrPics=document.getElementsByClassName("images"); 
var arrQuotes=document.getElementsByClassName("quotes"); 
var length=arrPics.length; 
for (var i=0; i<length; i++) { 
arrPics[i].style.display="none"; 
arrQuotes[i].style.display="none"; 
} 
count++; 
if (count>length) { 
count=1; 
} 
arrPics[count-1].style.display="block"; 
arrQuotes[count-1].style.display="block"; 
setTimeout(slidePictures, 5000); 
} 
slidePictures();




//login validation
function validate(){
var username=document.getElementById("username").value;
var password=document.getElementById("password").value;
if (username=="finalProject52" && password=="final523") {
alert ("Login successfully");
window.location = "index.html";
return false;
}
else if (username=="" && password==""){
alert("Enter username and password");
}
else if (username==""){
alert("Enter username");
}
else if (password==""){
alert("Enter password");
}
else {
alert("Username or password is incorrect");
}
}




//registration
function register() { 
  var user=document.getElementById("user").value;
  var email=document.getElementById("e-mail").value;
  var pass=document.getElementById("pass").value;
  var confirm=document.getElementById("confirm").value;
  if (user.match(/[A-Z]{1}[a-z][0-9]{2}/i) && user.length>=5) {
  	document.getElementById("wrong-mark").style.display="none";
    document.getElementById("check-mark").style.display="inline";
  }
  else {
    document.getElementById("wrong-mark").style.display="inline";
  }

  if (email.match(/^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/)) {
    document.getElementById("wrong-mark1").style.display="none";
    document.getElementById("check-mark1").style.display="inline";
  }
  else {
    document.getElementById("wrong-mark1").style.display="inline";
  }

  if (pass.match(/[A-Z][a-z][0-9]/i)) {
  	document.getElementById("wrong-mark2").style.display="none";
    document.getElementById("check-mark2").style.display="inline";
  }
  else {
    document.getElementById("wrong-mark2").style.display="inline";
  }

  if (pass==confirm && confirm!="") {
  	document.getElementById("wrong-mark3").style.display="none";
    document.getElementById("check-mark3").style.display="inline";
  }
  else {
    document.getElementById("wrong-mark3").style.display="inline";
  }

  if (user.match(/[A-Z]{1}[a-z][0-9]{2}/i) && user.length>=5 && email.match(/^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/) && pass.match(/[A-Z][a-z][0-9]/i) && pass==confirm) {
    alert("You have successfully registered");
  }
}



//back to top
if ($('#toTop').length) {
    var scrollTrigger=100,
        toTop=function () {
            var scrollTop=$(window).scrollTop();
            if (scrollTop>scrollTrigger) {
                $('#toTop').addClass('show');
            } else {
                $('#toTop').removeClass('show');
            }
        };
    toTop();
    $(window).on('scroll', function () {
        toTop();
    });
    $('#toTop').on('click', function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 600);
    });
}