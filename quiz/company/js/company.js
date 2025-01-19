document.addEventListener("DOMContentLoaded", function () {
    var signupBtn = document.querySelector(".signup-btn");
    var loginBtn = document.querySelector(".login-btn");
    var loginBox = document.querySelector(".login-box");
    var signupBox = document.querySelector(".signup-box");

    if (signupBtn && signupBox) {
        signupBtn.onclick = function () {
            signupBox.classList.add('active');
            loginBox.classList.remove('active');
            signupBtn.classList.add('d-none');
            loginBtn.classList.remove('d-none');
        };
    }

    if (loginBtn && loginBox) {
        loginBtn.onclick = function () {
            loginBox.classList.add('active');
            signupBox.classList.remove('active');
            loginBtn.classList.add('d-none');
            signupBtn.classList.remove('d-none');
        };
    }
});
// Wait for the DOM to load completely before executing the script
document.addEventListener("DOMContentLoaded",function (){
    // Select the button by its class name
    const studentLoginButton = document.querySelector(".studentlogin-btn");
  
    // Ensure the button is found before adding an event listener
    if (studentLoginButton) {
      studentLoginButton.addEventListener("click",function (){
        window.location.href = "../student/Slogin.php";
      });
    } else {
      console.error("Student Login button not found!");
    }
  });
  