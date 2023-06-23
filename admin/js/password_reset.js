//**********************
// Variables
//**********************
const passwordInput = document.querySelector("#new-password");
const passwordConfirmationInput = document.querySelector("#password-confirmation");
const passwordConfirmationContainer = document.querySelector(".password-confirmation-container");
const submitBtn = document.querySelector("button.reset-password");

const passwordToggles = document.querySelectorAll(".password-toggle");
const passwordTogglesArr = [...passwordToggles];

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


// password requirements 
function createRequirements() {

  const requirementsContainer = document.createElement("div");
  requirementsContainer.classList.add("password-requirements");
  const requirementsTitle = document.createElement("p");
  requirementsTitle.innerText = "Password requirements:";
  requirementsContainer.append(requirementsTitle);
  const list = document.createElement("ul");
  list.classList.add("requirements-list");
  requirementsContainer.append(list);

  requirementsList = list;
  updateRequirementsList(requirementsList);
  passwordConfirmationContainer.after(requirementsContainer);

}

function requirementsCheck(inputValue) {

  let requirements = {};

  requirements.nowhitespace= "Password must not contain whitespaces.";
  requirements.uppercaseletter = "Password must have at least one uppercase character.";
  requirements.lowercaseletter = "Password must have at least one lowercase character.";
  requirements.digit = "Password must contain at least one digit.";
  requirements.specialcharacter = "Password must contain at least one special symbol.";
  requirements.passwordlength = "Password must be at least 8 characters long.";
  

  if(!whitespace.test(inputValue)) delete requirements.nowhitespace;
  if (containsUppercase.test(inputValue)) delete requirements.uppercaseletter;
  if (containsLowercase.test(inputValue)) delete requirements.lowercaseletter;
  if (containsNumber.test(inputValue)) delete requirements.digit;
  if (containsSymbol.test(inputValue)) delete requirements.specialcharacter;
  if (validLength.test(inputValue)) delete requirements.passwordlength;

  // console.log(requirements);
  return requirements;
  
}

function templateHandling(requirements) {
  let template = '';
  if (Object.keys(requirements).length === 0) {
    template = "strong password &#9989";
    return template;
    // console.log("handling if");
  } else { 
    for (const [key, value] of Object.entries(requirements)) {
      template += [value] + "<br>";
    }
    // console.log("handling else");
    return template;
  }
}

function updateRequirementsList(list) {
  const requirements = requirementsCheck(passwordInput.value);
  const template = templateHandling(requirements);
  list.innerHTML = template;

}

function removeRequirementsContainer() {

  if (document.querySelector("div.password-requirements")) {
    document.querySelector("div.password-requirements").remove();
  }

}


//**********************
// Event Listeners
//**********************

// input field validations
passwordInput.addEventListener("focusout", passwordValidation);
passwordInput.addEventListener("focusin", createRequirements);
passwordInput.addEventListener("focusout", removeRequirementsContainer);
passwordInput.addEventListener("keyup", () => {
  updateRequirementsList(requirementsList);

});
passwordConfirmationInput.addEventListener("focusout", passwordConfirmationValidation);

passwordTogglesArr.forEach((item) => {

  item.addEventListener("click", function () {

    if(this===passwordToggles[0]) {
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

    } else {
      const typePasswordConf =
      passwordConfirmationInput.getAttribute("type") === "password" ? "text" : "password";
      passwordConfirmationInput.setAttribute("type", typePasswordConf);
      // toggle the icon
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
      // toggle the aria-label
      const ariaToggle = 
      this.getAttribute("aria-label") === "show password" ? "hide password" : "show password";
      this.setAttribute("aria-label", ariaToggle);
    }

  });
});


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