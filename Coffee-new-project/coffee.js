var modal = document.getElementById("myModal");


var btn = document.getElementById("myBtn");


var span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
  modal.style.display = "block";
}


span.onclick = function() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


var signupLink = document.getElementById("signupLink");


var loginForm = document.getElementById("loginForm");
var signupForm = document.getElementById("signupForm");


signupLink.onclick = function() {
  loginForm.style.display = "none";
  signupForm.style.display = "block";
}