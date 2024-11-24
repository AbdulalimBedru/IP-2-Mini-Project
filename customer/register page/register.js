var email = document.querySelector('#email');
var Fname = document.querySelector('#fname');
var Lname = document.querySelector('#lname');
var uname = document.querySelector('#uname');
var password = document.querySelector('#pass');
var coniremPassword = document.querySelector('#cpass');
var error = document.querySelector(".error");
var showp = document.querySelector(".showp");
var showcp = document.querySelector(".showcp");
var btn = document.querySelector("#btn");
var cpass = document.querySelector("#cpass ~ .error");
var address = document.querySelector("#adr");

var isEmailValid =isFnmaeValid = isLnmaeValid = isunmaeValid = isPassValid = isCPassValid =false;
btn.disabled = true;

var emailregx = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
var letter = /^[A-Za-z]+$/;

// validattion for email
email.addEventListener("input",function(e){
  
 if(!emailregx.test(email.value)){
   e.target.nextElementSibling.nextElementSibling.textContent = "pls enter valid email";
   e.target.style.border = "2px solid red";
   isEmailValid = false;
 }
 else{
  e.target.nextElementSibling.nextElementSibling.textContent = "";
  e.target.style.border = "2px solid green" ;
  isEmailValid = true;
 }
 isAllValid()
});
// validattion for first name
Fname.addEventListener("input" , function(e){
  var errormesage ="" , isvalid = true;
   if(Fname.value.length < 4){
    errormesage = "First Name is Too Short";
    isvalid = false;
  }
  if(Fname.value.length >= 12){
    errormesage = "First Name is Too Long";
    isvalid = false;
    }
  if(!Fname.value.match(letter)){
    errormesage = "Name Must Be only Alphabet";
    isvalid = false;
  }
  if(Lname.value === Fname.value){
    errormesage = "First Name And Last Name Should Not Be Same";
    isvalid = false;
  }
  if (isvalid) {
    e.target.nextElementSibling.nextElementSibling.textContent = "";
    e.target.style.border = "2px solid green";
    isFnmaeValid = true;
  }
  else{
    e.target.nextElementSibling.nextElementSibling.textContent = errormesage;
    e.target.style.border = "2px solid red";
    isFnmaeValid = false;
   } 
   isAllValid()  
});
// validattion for last name
Lname.addEventListener("input" , function(e){
  var errormesage ="" , isvalid = true;
   if(Lname.value.length < 4){
    errormesage = "Last Name is Too Short";
    isvalid = false;
  }
  if(Lname.value.length >= 12){
    errormesage = "Last Name is Too Long";
    isvalid = false;
    }
  if(!Lname.value.match(letter)){
    errormesage = "Name Must Be only Alphabet";
    isvalid = false;
  }
  if(Lname.value === Fname.value){
    errormesage = "First Name And Last Name Should Not Be Same";
    isvalid = false;
  }
  if (isvalid) {
    e.target.nextElementSibling.nextElementSibling.textContent = "";
    e.target.style.border = "2px solid green";
    isLnmaeValid = true;
  }
  else{
    e.target.nextElementSibling.nextElementSibling.textContent = errormesage;
    e.target.style.border = "2px solid red";
    isLnmaeValid = false;
   }   
   isAllValid()
});
// validation for user name
uname.addEventListener('input', function (e) {
  var errormesage = "" , isvalid = true;
  if(uname.value.includes(" ") || uname.value.length < 4){
    errormesage = "Pls Enter Valid Username";
    isvalid = false;  
  }
  if(uname.value.length > 8){
    errormesage = "Username is too long";
    isvalid = false;  
  }

  if(isvalid){
    e.target.nextElementSibling.nextElementSibling.textContent = "";
    e.target.style.border = "2px solid green";
    isunmaeValid = true;
  }
  else{
      e.target.nextElementSibling.nextElementSibling.textContent = errormesage;
      e.target.style.border = "2px solid red";
      isunmaeValid = false;
  }
  isAllValid()
});
//validation for address
address.addEventListener('input', function (e) {
  var errormesage = "" , isvalid = true;
  if(address .value.length < 4 || address.value === " "){
    errormesage = "Pls Enter Valid address";
    isvalid = false;  
  }
  if(isvalid){
    e.target.nextElementSibling.nextElementSibling.textContent = "";
    e.target.style.border = "2px solid green";
    isunmaeValid = true;
  }
  else{
      e.target.nextElementSibling.nextElementSibling.textContent = errormesage;
      e.target.style.border = "2px solid red";
      isunmaeValid = false;
  }
  isAllValid()
});
//password validation function
var smalLetter = /[a-z]/; 
var capitalLetter = /[A-Z]/;
var pattern = /[!@#$%^&*(),.?":{}|<>]/;
var number = /\d/; 
function validatepass(){
  var errormesage = "" , isvalid = true;
  if(!smalLetter.test(password.value)){
    errormesage = "Password must contain at least one lowercase letter. ";
    isvalid = false;
  }
  if(!capitalLetter.test(password.value)){
    errormesage = "Password must contain at least one upercase letter. ";
    isvalid = false;
  }
  if(!pattern.test(password.value)){
    errormesage = "Password must contain at least one special character. ";
    isvalid = false;
  }
  if(!number.test(password.value)){
    errormesage = "Password must contain at least one number. ";
    isvalid = false;
  }
  if(password.value.length < 8 || password.value.length >14 ){
    errormesage = "password length must be between 8 and 14 characters. ";
    isvalid = false;
  }
  if(isvalid ){
    password.nextElementSibling.nextElementSibling.nextElementSibling.textContent = " ";
    password.style.border = "2px solid green";
    isPassValid = true;
  }
  else{
    password.nextElementSibling.nextElementSibling.nextElementSibling.textContent = errormesage;
    password.style.border = "2px solid red";
    isPassValid = false;
}
isAllValid()
}
 function validateconfirmpass(){
  if(password.value != coniremPassword.value){
    coniremPassword.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "Password must be the same.";
    coniremPassword.style.border = "2px solid red"; 
    isCPassValid = false;
  }
  
  else{
    coniremPassword.nextElementSibling.nextElementSibling.nextElementSibling.textContent = " ";
    coniremPassword.style.border = "2px solid green"; 
    isCPassValid = true;
}
isAllValid()
 }
 //password validation event listener
 password.addEventListener("input",function(){
  validatepass();
  validateconfirmpass();
});
coniremPassword.addEventListener("input",function(){
  validateconfirmpass();
});

showp.addEventListener("click" , function(e){
    if(e.target.previousElementSibling.type === "password"){
      e.target.previousElementSibling.type = "text";
      e.target.textContent = " Hide ";
    }
    else{
      e.target.previousElementSibling.type = "password";
      e.target.textContent = "Show";
 }
});
showcp.addEventListener("click" , function(e){
  if(e.target.previousElementSibling.type === "password"){
    e.target.previousElementSibling.type = "text";
    e.target.textContent = " Hide ";
  }
  else{
    e.target.previousElementSibling.type = "password";
    e.target.textContent = "Show";
} 
});
function isAllValid(){
  if(isEmailValid && isFnmaeValid && isLnmaeValid && isunmaeValid && isPassValid && isCPassValid){
    btn.disabled = false;
 }
 else{
  btn.disabled = true;
 }
}
