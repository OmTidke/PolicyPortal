function showConfirmPasswordFun() {
    var x = document.getElementById("confirmPasswordInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function showPasswordFun() {
    var x = document.getElementById("passwordInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function showPasswordLoginFun() {
    var x = document.getElementById("showPasswordLogin");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  // Add event listener for form submit
document.getElementById('registerForm').addEventListener('submit', function (e) {
  e.preventDefault(); // Prevent form submission
  // Fetch form values
  var password = document.getElementById('passwordInput').value;
  var confirmPassword = document.getElementById('confirmPasswordInput').value;
  
  // Compare password and confirm password
  if (password !== confirmPassword) {
      // Display error message
      document.getElementById('confirmPasswordError').innerText = "Passwords do not match";
  } else {
      // Passwords match, proceed with form submission
      document.getElementById('confirmPasswordError').innerText = ""; // Clear error message
      // Your form submission logic here
  }
});

function matchPassword() {  
  var pw1 = document.getElementById("passwordInput");  
  var pw2 = document.getElementById("confirmPasswordInput");  
  if(pw1 != pw2)  
  {   
     // Display error message
     document.getElementById('confirmPasswordError').innerText = "Passwords do not match";
  } else if(pw1 == "" || pw2 == "")
  {
    document.getElementById('confirmPasswordError').innerText = "Please enter the password.";
  }
  else {  
    alert("Password created successfully");  
  }  
}  
