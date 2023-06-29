//**********************
// Variables
//**********************
const passwordInput = document.querySelector("#new-password");
const passwordConfirmationInput = document.querySelector("#password-confirmation");
const passwordConfirmationContainer = document.querySelector(".password-confirmation-container");
const submitBtn = document.querySelector("button.reset-password");

// styling colors
const validColor = "#008000";
const errorColor = "#F50404";

// user input value collection
let password, passwordConfirmation;
let data = {}
let validationErrors = {
  password,
  passwordConfirmation
}

//RegEx
const whitespace = /^(?=.*\s)/;
const containsUppercase = /^(?=.*[A-Z])/;
const containsLowercase = /^(?=.*[a-z])/;
const containsNumber = /^(?=.*[0-9])/;
const containsSymbol =
/^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹])/;
const validLength = /^.{8,}$/;

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

function passwordValidation () {
  detectErrorMsg("password-container");

  password = passwordInput.value;

  const errorMsgPassword = () => {
    displayErrorMsg(
      validationErrors.password,
      "password-container",
      "new-password")
  }

  if (!password) {
    validationErrors.password = "Please enter a new password";
    errorMsgPassword();
  } else if (whitespace.test(password)) {
    validationErrors.password = "Password must not contain whitespaces.";
    errorMsgPassword();
  } else if (!containsUppercase.test(password)) {
    validationErrors.password = "Password must have at least one uppercase character.";
    errorMsgPassword();
  } else if (!containsLowercase.test(password)) {
    validationErrors.password = "Password must have at least one lowercase character.";
    errorMsgPassword();
  } else if (!containsNumber.test(password)) {
    validationErrors.password = "Password must contain at least one digit.";
    errorMsgPassword();
  } else if (!containsSymbol.test(password)) {
    validationErrors.password = "Password must contain at least one special symbol.";
    errorMsgPassword();
  } else if (!validLength.test(password)) {
    validationErrors.password = "Password must be at least 8 characters long.";
    errorMsgPassword();
  } else {
    delete validationErrors.password;
    validStyle("new-password");
  }
}

function passwordConfirmationValidation() {
  detectErrorMsg("password-confirmation-container");

  passwordConfirmation = passwordConfirmationInput.value;

  const errorMsgPasswordConfirmation = () => {
    displayErrorMsg(
      validationErrors.passwordConfirmation,
      "password-confirmation-container",
      "password-confirmation")
  }

  if (!passwordConfirmation) {
    validationErrors.passwordConfirmation = "Please confirm your new password";
    errorMsgPasswordConfirmation();
  } else if (passwordConfirmation!==password){
    validationErrors.passwordConfirmation = "Passwords don't match. Take another look.";
    errorMsgPasswordConfirmation();
  } else {
    delete validationErrors.passwordConfirmation;
    validStyle("password-confirmation");
  }
  
}


//**********************
// Event Listeners
//**********************

// input field validations
passwordInput.addEventListener("focusout", passwordValidation);
passwordConfirmationInput.addEventListener("focusout", passwordConfirmationValidation);


document.querySelector("form").addEventListener("submit", function (event) {

  event.preventDefault();

  // remove submit error msg timer
  const removeSubmitMessage = () => {
    setTimeout(() => {
    document.querySelector("div.alert").remove();
    submitBtn.disabled = false;
    }   , 5000);
  };

  if (!passwordInput.value || !passwordConfirmationInput.value) {

      // create submit error msg
      const alert = document.createElement("div");
      alert.classList.add("alert");
      const alertMsg = document.createElement("p");
      alertMsg.innerText = "❗️ Please enter and confirm your new password"
      alert.appendChild(alertMsg);
      document.querySelector("ul.password-rules").after(alert);
      submitBtn.disabled = true;

      removeSubmitMessage();

  } else {
    // remove submit fail message
    if (document.querySelector("div.alert")) {
      document.querySelector("div.alert").style.display = "none";
    }
    // disable submit button to prevent double submit
    submitBtn.disabled = true;

     //send form (data object) to backend
    //  console.log("sending form data to backend");
  }

});