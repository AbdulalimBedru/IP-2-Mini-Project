var username = document.querySelector("#username");
var error = document.querySelector(".msg");
var show = document.querySelector(".show");
var pass = document.querySelector("#password");
var btn = document.querySelector("#btn");
var errorp = document.querySelector("#password ~ .msg");

var passwordregx = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,14}$/;

var isunameValid = false;
var ispassValid = false;
btn.disabled = true;

username.addEventListener('input', function (e) {
    if(username.value.includes(" ") || username.value.length < 4){
      e.target.nextElementSibling.nextElementSibling.textContent = "pls enter valid username";
      e.target.style.border = "2px solid red";
      isunameValid = false;
    }
    else{
      e.target.nextElementSibling.nextElementSibling.textContent = " ";
      e.target.style.border = "2px solid green" 
      isunameValid = true;
    }
    isAllValid();
});
pass.addEventListener("input",function(e){
      if(!passwordregx.test(password.value)){
        e.target.nextElementSibling.nextElementSibling.nextElementSibling.textContent = "pls enter valid password";
        e.target.style.border = "2px solid red";
         ispassValid = false
      }
      else{
        e.target.nextElementSibling.nextElementSibling.nextElementSibling.textContent = " ";
        e.target.style.border = "2px solid green";
        ispassValid = true;
      }
      isAllValid();
});
function isAllValid(){
  if(ispassValid && isunameValid){
    btn.disabled = false;
  }
  else{
    btn.disabled = true;
  }
}
show.addEventListener("click" , function(){
   if(pass.type === "password"){
      pass.type = "text";
      show.textContent = " Hide ";
   }
   else{
        pass.type = "password";
        show.textContent = "Show";
   }
});
