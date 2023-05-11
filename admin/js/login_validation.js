//**********************
// Variables
//**********************

const usernameInput = document.querySelector("#username-or-email");
const passwordInput = document.querySelector("#password");
const lockClosed = document.querySelector(".lock-polygon-closed");
const lockOpen = document.querySelector(".lock-polygon-open")

const passwordToggle = document.querySelector(".password-toggle");
console.log(passwordToggle);

// styling colors
const validColor = "#008000";
const errorColor = "#F50404";

// user input value collection
let username, password;
let data = {}
let validationErrors = {
  username,
  password
}

//**********************
// Functions
//**********************

// check for error messages
function detectErrorMsg(containerName) {
  if (document.querySelector(`.${containerName} span`)) {
    document
      .querySelectorAll(`.${containerName} span`)
      .forEach((spanElement) => {
        spanElement.remove();
      });
  }
}

// display error message
function displayErrorMsg(errorMessage, containerName, inputID, selector = "label") {
  const errorDisplay = createErrorSpan(errorMessage);
  document.querySelector(`.${containerName} ${selector}`).after(errorDisplay);
  document.querySelector(`#${inputID}`).style.borderColor = errorColor;
  document.querySelector(`#${inputID}`).setAttribute("aria-invalid", "true");
}

// const create error span
function createErrorSpan(errorMessage) {
  const errorSpan = document.createElement("span");
  errorSpan.classList.add("error-span");
  errorSpan.innerText = errorMessage;
  return errorSpan;
}

// valid input field style
function validStyle(inputID) {
  document.querySelector(`#${inputID}`).style.borderColor = validColor;
  document.querySelector(`#${inputID}`).setAttribute("aria-invalid", "false");
}


function usernameValidation () {
  detectErrorMsg("username-container");

  username = usernameInput.value;

  const errorMsgUsername = () => {
    displayErrorMsg(
      validationErrors.username,
      "username-container",
      "username-or-email")
  }

  if (!username) {
    console.error("No username provided");
    validationErrors.username = "Please enter your username";
    errorMsgUsername();
  } else {
    console.info(`${username} matches`);
    delete validationErrors.username;
    validStyle("username-or-email");
  }

}

function passwordValidation () {
  detectErrorMsg("password-container");

  password = passwordInput.value;

  const errorMsgPassword = () => {
    displayErrorMsg(
      validationErrors.password,
      "password-container",
      "password")
  }

  if (!password) {
    console.error("No password provided");
    validationErrors.password = "Please enter your password";
    errorMsgPassword();
  } else {
    console.info(`${password} matches`);
    delete validationErrors.password;
    validStyle("password");
  }
  
}


// password visibility toggle
function passwordVisibility () {
  console.log("click");

  // toggle the "type"-attribute
  const typePassword =
  passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", typePassword);

  // toggle the icon
  this.classList.toggle("fa-eye");
  this.classList.toggle("fa-eye-slash");

  // toggle the aria-label
  const ariaToggle = 
  this.getAttribute("aria-label") === "show password" ? "hide password" : "show password";
  this.setAttribute("aria-label", ariaToggle);
}


//**********************
// EventListeners
//**********************

passwordToggle.addEventListener("click", passwordVisibility);
usernameInput.addEventListener("focusout", usernameValidation);
passwordInput.addEventListener("focusout", passwordValidation);

document.querySelector("form").addEventListener("submit", function (event) {

  event.preventDefault();

  // remove submit error msg timer
  const removeSubmitMessage = () => {
    setTimeout(() => {
    document.querySelector("div.alert").remove();
    }   , 5000);
  };

  if (Object.keys(validationErrors).length > 0) {

    usernameValidation();
    passwordValidation();

      // create submit error msg
      const alert = document.createElement("div");
      alert.classList.add("alert");
      const alertMsg = document.createElement("p");
      alertMsg.innerText = "❗️ Please fill out username and password"
      alert.appendChild(alertMsg);
      document.querySelector("button.form-submit").after(alert);
  
      removeSubmitMessage();
  
      console.error("there are still errors")
      console.log(validationErrors);

  } else {
    // remove submit fail message
    if (document.querySelector("div.alert")) {
      document.querySelector("div.alert").style.display = "none";
    }
    // disable submit button to prevent double submit
    document.querySelector("button.form-submit").disabled = true;

    data.username = username;
    data.password = password;
    
     //send form (data object) to backend
     console.log("sending form data to backend");
  }

});