//**********************
// Variables
//**********************

// input fields 
const titleInput = document.querySelector("#user-title");
const genderInput = document.querySelectorAll("input[name='gender']");
const givenNameInput = document.querySelector("#given-name");
const familyNameInput = document.querySelector("#family-name");
const usernameInput = document.querySelector("#username");
const emailInput = document.querySelector("#email");
const emailConfirmationInput = document.querySelector("#email-confirmation");
const passwordInput = document.querySelector("#password");
const passwordConfirmationInput = document.querySelector("#password-confirmation");
const termsAndConditionsInput = document.querySelector('#terms-and-conditions');

// password toggle
const passwordToggles = document.querySelectorAll(".password-toggle");
const passwordTogglesArr = [...passwordToggles]

// styling colors
const validColor = "#008000";
const errorColor = "#F50404";


// user input value collection
let title, givenName, familyName, username, email, emailConfirmation, password, passwordConfirmation;
let gender = genderInput[0].value;
let data = {};
let validationErrors = {
  title,
  givenName,
  familyName,
  username,
  email,
  emailConfirmation,
  password,
  passwordConfirmation
};


// RegEx
const nameRegEx = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{1,}$/;
const usernameRegEx = /^.{4,16}$/;
// const usernameRegExMax = /^[A-Za-z0-9_.-]{4,16}$/;
const emailRegEx =
  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
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


// input field validations

function titleValidation() {
  detectErrorMsg("user-title-container");

  title = titleInput.value;
  if (title == "") {
    // console.error("No title provided");
    validationErrors.title = "Please select your title";
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.title,
      "user-title-container",
      "user-title",
      "select");
  } else {
    delete validationErrors.title;
    validStyle("user-title");
    // console.log(validationErrors);
  }
}


// console.log(gender);

/* ERROR??? */

function showSelected() {
  if (this.checked) {
    gender = this.value;
    console.log(gender);
  }
}


function givenNameValidation() {
  detectErrorMsg("given-name-container");


  givenName = givenNameInput.value;
  if (!givenName) {
    // console.error("No given name provided");
    validationErrors.givenName = "Please enter your first name";
    detectErrorMsg("given-name");
    displayErrorMsg(
      validationErrors.givenName,
      "given-name-container",
      "given-name");
  } else {
      // console.info(`${givenName} is valid`);
      delete validationErrors.givenName;
      detectErrorMsg();
      validStyle("given-name");
      // console.log(validationErrors);
    }
}


function familyNameValidation() {
  detectErrorMsg("family-name-container");

  familyName = familyNameInput.value;
  if (!familyName) {
    // console.error("No family name provided");
    validationErrors.familyName = "Please enter your last name";
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.familyName,
      "family-name-container",
      "family-name");
  } else {
      // console.info(`${familyName} is valid`);
      delete validationErrors.familyName;
      detectErrorMsg();
      validStyle("family-name");
      // console.log(validationErrors);
    }
}


function usernameValidation() {
  detectErrorMsg("username-container");

  username = usernameInput.value;
  if (!username) {
    // console.error("No email provided");
    validationErrors.username = "Please enter a username";
    displayErrorMsg(
      validationErrors.username,
      "username-container",
      "username")
  } else if (!usernameRegEx.test(username)) {
      // console.error("Invalid email address");
      validationErrors.username = "Username must be between 4 and 16 characters";
      displayErrorMsg(
        validationErrors.username,
        "username-container",
        "username")
  } else if (whitespace.test(username)) {
      // console.error("Invalid email address");
      validationErrors.username = "Username must not conain spaces";
       displayErrorMsg(
        validationErrors.username,
        "username-container",
        "username")
  } else {
      // console.info(`${username} is valid`);
      delete validationErrors.username;
      validStyle("username");
  }
}

function emailValidation() {
  detectErrorMsg("email-container");

  email = emailInput.value;
  if (!email) {
    // console.error("No email provided");
    validationErrors.email = "Please enter your email address";
    displayErrorMsg(
      validationErrors.email,
      "email-container",
      "email")
  } else {
    if (!emailRegEx.test(email)) {
      // console.error("Invalid email address");
      validationErrors.email = "Invalid email address";
      displayErrorMsg(
        validationErrors.email,
        "email-container",
        "email")
    } else {
      // console.info(`${email} is valid`);
      delete validationErrors.email;
      validStyle("email");
    }
  }
}


function emailConfirmationValidation() {
  detectErrorMsg("email-confirmation-container");

  emailConfirmation = emailConfirmationInput.value;
  if (!emailConfirmation) {
    console.error("No email confirmation provided");
    validationErrors.emailConfirmation = "Please confirm your email address";
    displayErrorMsg(
      validationErrors.emailConfirmation,
      "email-confirmation-container",
      "email-confirmation")
  } else if (emailConfirmation!==email){
      console.error("Passwords dont match");
      validationErrors.emailConfirmation = "Email addresses don't match. Take another look.";
      displayErrorMsg(
        validationErrors.emailConfirmation,
        "email-confirmation-container",
        "email-confirmation")
    } else {
      // console.info(`${email} matches`);
      delete validationErrors.emailConfirmation;
      validStyle("email-confirmation");
    }
}


passwordTogglesArr.forEach((item) => {

  item.addEventListener("click", function () {

    if(this==passwordToggles[0]) {
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


function passwordRequirements() {

  console.log("focusin");

  const requirementsContainer = document.createElement("div");
  requirementsContainer.classList.add("password-requirements");
  const requirementsTitle = document.createElement("p");
  requirementsTitle.innerText = "Password requirements:";
  requirementsContainer.append(requirementsTitle);
  const requirementsList = document.createElement("ul");
  requirementsList.classList.add("requirements-list");
  requirementsContainer.append(requirementsList);

  const requirements = `
  <li>Must contain at least <b>8 characters</b></li>
  <li>Must contain at least <b>one lowercase letter</b></li>
  <li>Must contain at least <b>one capital letter</b></li>
  <li>Must contain at least <b>one number</b></li>
  <li>Must contain at least <b>one special character</b></li>
  <li>Must <b>not contain spaces</b></li>
  `;
  requirementsList.innerHTML = requirements;

  passwordInput.after(requirementsContainer);

}


function removeRequirements() {
  if (document.querySelector("div.password-requirements")) {
    document.querySelector("div.password-requirements").remove();
  }
}


function passwordValidation() {
  detectErrorMsg("password-container");

  password = passwordInput.value;
  const errorMsgPassword = () => {
   displayErrorMsg(
    validationErrors.password,
    "password-container",
    "password")
  }

  if (!password) {
    validationErrors.password = "Please enter a password";
    errorMsgPassword();
  } else if (whitespace.test(password)) {
    validationErrors.password = "Password must not contain whitespaces.";
    console.log("Password must not contain whitespaces.");
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
    console.info(`${password} is valid`);
    delete validationErrors.password;
    validStyle("password");
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
    // console.error("No email confirmation provided");
    validationErrors.passwordConfirmation = "Please confirm your password";
    errorMsgPasswordConfirmation();
  } else if (passwordConfirmation!==password){
    console.error("passwords dont match");
    validationErrors.passwordConfirmation = "Passwords don't match. Take another look.";
    errorMsgPasswordConfirmation();
  } else {
    // console.info(`${password} matches`);
    delete validationErrors.passwordConfirmation;
    validStyle("password-confirmation");
  }
  
}


//**********************
// EventListeners
//**********************


// input field validations
titleInput.addEventListener("focusout", titleValidation);
for (const radioButton of genderInput) {
  radioButton.addEventListener("change", showSelected);
}
givenNameInput.addEventListener("focusout", givenNameValidation);
familyNameInput.addEventListener("focusout", familyNameValidation);
usernameInput.addEventListener("focusout", usernameValidation);
emailInput.addEventListener("focusout", emailValidation);
emailConfirmationInput.addEventListener("focusout", emailConfirmationValidation);
passwordInput.addEventListener("focusin", passwordRequirements);
passwordInput.addEventListener("focusout", removeRequirements);
passwordInput.addEventListener("focusout", passwordValidation);
passwordConfirmationInput.addEventListener("focusout", passwordConfirmationValidation);





// form validation on "submit"
document.querySelector("form").addEventListener("submit", function (event) {

  event.preventDefault();

   // remove submit error msg timer
   const removeSubmitMessage = () => {
    setTimeout(() => {
    document.querySelector("div.alert").remove();
    }   , 5000);
  };

  if (Object.keys(validationErrors).length > 0) {
   

    // create submit error msg
    const alert = document.createElement("div");
    alert.classList.add("alert");
    const alertMsg = document.createElement("p");
    alertMsg.innerText = "❗️ Please fill out all required fields correctly"
    alert.appendChild(alertMsg);
    document.querySelector("button.form-submit").after(alert);

    removeSubmitMessage();

    console.error("there are still errors")
    console.log(validationErrors);

  } else if(!termsAndConditionsInput.checked) {
    console.log("not accepted");
    // create checkbox erros msg
    const alert = document.createElement("div");
    alert.classList.add("alert");
    const alertMsg = document.createElement("p");
    alertMsg.innerText = "❗️ Please accept Terms & Conditions"
    alert.appendChild(alertMsg);
    document.querySelector("button.form-submit").after(alert);

    removeSubmitMessage();

  } else if(termsAndConditionsInput.checked && Object.keys(validationErrors).length == 0) {

    // remove checkbbox error msg

    // remove submit fail message
    if (document.querySelector("div.alert")) {
      document.querySelector("div.alert").style.display = "none";
    }
    // disable submit button to prevent double submit
    document.querySelector("button.form-submit").disabled = true;

    data.title = title;
    data.gender = gender;
    data.givenName = givenName;
    data.familyName = familyName;
    data.username = username;
    data.email = email;
    data.emailConfirmation = emailConfirmation;
    data.password = password;
    data.passwordConfirmation = passwordConfirmation;

    //send form (data object) to backend
    console.log("sending form data to backend");

    // call php doc


  }
});