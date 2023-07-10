//**********************
// Variables
//**********************

// input fields 
const titleInput = document.querySelector('#user-title');
const genderInput = document.querySelectorAll('input[name="gender"]');
const givenNameInput = document.querySelector('#given-name');
const familyNameInput = document.querySelector('#family-name');
const usernameInput = document.querySelector('#username');
const emailInput = document.querySelector('#email');
const emailConfirmationInput = document.querySelector('#email-confirmation');
const passwordInput = document.querySelector('#password');
const passwordConfirmationInput = document.querySelector('#password-confirmation');
const termsAndConditionsInput = document.querySelector('#terms');

// styling colors
const validColor = '#008000';
const errorColor = '#F50404';


// user input value collection
let title, gender, givenName, familyName, username, email, emailConfirmation, password, passwordConfirmation, terms;
// let gender = genderInput[0].value;
// let data = {};
let requirementsList;
let validationErrors = {
  title,
  gender,
  givenName,
  familyName,
  username,
  email,
  emailConfirmation,
  password,
  passwordConfirmation,
  terms
};


// RegEx
const usernameRegEx = /^.{4,16}$/;
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
  if (document.querySelector(`.${containerName}>span`)) {
    document
      .querySelectorAll(`.${containerName} span`)
      .forEach((spanElement) => {
        spanElement.remove();
      });
  }
}

//display error message
function displayErrorMsg(errorMessage, containerName, inputID, selector = 'label') {
  const errorDisplay = createErrorSpan(errorMessage);
  document.querySelector(`.${containerName} ${selector}`).after(errorDisplay);
  document.querySelector(`#${inputID}`).style.borderColor = errorColor;
  document.querySelector(`#${inputID}`).setAttribute('aria-invalid', 'true');
}

// display error message radio buttons
function displayErrorMsgRadioBtn(errorMessage, containerName) {
  const errorDisplay = createErrorSpan(errorMessage);
  document.querySelector(`.${containerName}`).after(errorDisplay);
}


// const create error span
function createErrorSpan(errorMessage) {
  const errorSpan = document.createElement('span');
  errorSpan.classList.add('error-span');
  errorSpan.innerText = errorMessage;
  return errorSpan;
}

// valid input field style
function validStyle(inputID) {
  document.querySelector(`#${inputID}`).style.borderColor = validColor;
  document.querySelector(`#${inputID}`).setAttribute('aria-invalid', 'false');
}


// input field validations

function titleValidation() {
  detectErrorMsg('user-title-container');

  title = titleInput.value;
  if (title === '') {
    // console.error('No title provided');
    validationErrors.title = 'Please select a title';
    detectErrorMsg('user-title-container');
    displayErrorMsg(
      validationErrors.title,
      'user-title-container',
      'user-title',
      'select');
  } else {
    delete validationErrors.title;
    validStyle('user-title');
  }

}


function genderValidation() {
  detectErrorMsg('gender-radio-inputs');


  let checkedGender = document.querySelector('input[name = "gender"]:checked');
  
  if(!checkedGender) {
    validationErrors.gender = 'Please select your gender';
    // console.log(validationErrors.gender);
    detectErrorMsg('gender-radio-inputs');
    displayErrorMsgRadioBtn(
      validationErrors.gender,
      'radio-input-options');
  } else {
    detectErrorMsg('gender-radio-inputs');
    delete validationErrors.gender;
  }

}



function givenNameValidation() {
  detectErrorMsg('given-name-container');


  givenName = givenNameInput.value;
  if (!givenName) {
    validationErrors.givenName = 'Please enter your first name';
    detectErrorMsg('given-name');
    displayErrorMsg(
      validationErrors.givenName,
      'given-name-container',
      'given-name');
  } else {
      delete validationErrors.givenName;
      validStyle('given-name');
    }
}


function familyNameValidation() {
  detectErrorMsg('family-name-container');

  familyName = familyNameInput.value;
  if (!familyName) {
    validationErrors.familyName = 'Please enter your last name';
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.familyName,
      'family-name-container',
      'family-name');
  } else {
      delete validationErrors.familyName;
      validStyle('family-name');
    }
}


function usernameValidation() {
  detectErrorMsg('username-container');

  username = usernameInput.value;
  if (!username) {
    validationErrors.username = 'Please enter a username';
    displayErrorMsg(
      validationErrors.username,
      'username-container',
      'username')
  } else if (!usernameRegEx.test(username)) {
      validationErrors.username = 'Username must be between 4 and 16 characters';
      displayErrorMsg(
        validationErrors.username,
        'username-container',
        'username')
  } else if (whitespace.test(username)) {
      validationErrors.username = 'Username must not contain spaces';
       displayErrorMsg(
        validationErrors.username,
        'username-container',
        'username')
  } else {
      delete validationErrors.username;
      validStyle('username');
  }
}

function emailValidation() {
  detectErrorMsg('email-container');

  email = emailInput.value;
  if (!email) {
    // console.error('No email provided');
    validationErrors.email = 'Please enter your email address';
    displayErrorMsg(
      validationErrors.email,
      'email-container',
      'email')
  } else {
    if (!emailRegEx.test(email)) {
      // console.error('Invalid email address');
      validationErrors.email = 'Invalid email address';
      displayErrorMsg(
        validationErrors.email,
        'email-container',
        'email')
    } else {
      // console.info(`${email} is valid`);
      delete validationErrors.email;
      validStyle('email');
    }
  }
}


function emailConfirmationValidation() {
  detectErrorMsg('email-confirmation-container');

  emailConfirmation = emailConfirmationInput.value;
  if (!emailConfirmation) {
    // console.error('No email confirmation provided');
    validationErrors.emailConfirmation = 'Please confirm your email address';
    displayErrorMsg(
      validationErrors.emailConfirmation,
      'email-confirmation-container',
      'email-confirmation')
  } else if (emailConfirmation!==email){
      validationErrors.emailConfirmation = 'Email addresses don\'t match. Take another look.';
      displayErrorMsg(
        validationErrors.emailConfirmation,
        'email-confirmation-container',
        'email-confirmation')
    } else {
      // console.info(`${email} matches`);
      delete validationErrors.emailConfirmation;
      validStyle('email-confirmation');
    }
}


function passwordValidation() {

  detectErrorMsg('password-container');

  password = passwordInput.value;
  const errorMsgPassword = () => {
   displayErrorMsg(
    validationErrors.password,
    'password-container',
    'password')
  }

  
  if (!password || 
    whitespace.test(password) || 
    !containsUppercase.test(password) || 
    !containsLowercase.test(password) ||
    !containsNumber.test(password) ||
    !containsSymbol.test(password) ||
    !validLength.test(password)
    ) {
    validationErrors.password = 'Please make sure your password meets all requirements';
    errorMsgPassword();
  } else {
    delete validationErrors.password;
    validStyle('password');
  }

}


function passwordConfirmationValidation() {
  detectErrorMsg('password-confirmation-container');

  passwordConfirmation = passwordConfirmationInput.value;

  const errorMsgPasswordConfirmation = () => {
    displayErrorMsg(
      validationErrors.passwordConfirmation,
      'password-confirmation-container',
      'password-confirmation')
  }

  if (!passwordConfirmation) {
    validationErrors.passwordConfirmation = 'Please confirm your password';
    errorMsgPasswordConfirmation();
  } else if (passwordConfirmation!==password){
    validationErrors.passwordConfirmation = 'Passwords don\'t match. Take another look.';
    errorMsgPasswordConfirmation();
  } else {
    delete validationErrors.passwordConfirmation;
    validStyle('password-confirmation');
  }
  
}

function checkboxValidation() {

  detectErrorMsg('terms-and-conditions-container');

  if (!termsAndConditionsInput.checked) {
    validationErrors.terms = 'Please accept Terms & Conditions';
    detectErrorMsg('terms-and-conditions-container');
    displayErrorMsgRadioBtn(
      validationErrors.terms,
      'terms-after');
  } else {
    delete validationErrors.terms;
  }

}


//**********************
// EventListeners
//**********************


// input field validations
titleInput.addEventListener('focusout', titleValidation);
for (const radioButton of genderInput) {
  radioButton.addEventListener('change', genderValidation);
}
givenNameInput.addEventListener('focusout', givenNameValidation);
familyNameInput.addEventListener('focusout', familyNameValidation);
usernameInput.addEventListener('focusout', usernameValidation);
emailInput.addEventListener('focusout', emailValidation);
emailConfirmationInput.addEventListener('focusout', emailConfirmationValidation);
passwordInput.addEventListener('focusout', passwordValidation);
passwordConfirmationInput.addEventListener('focusout', passwordConfirmationValidation);





// form validation on 'submit'
document.querySelector('form').addEventListener('submit', function (event) {

  titleValidation();
  genderValidation();
  givenNameValidation();
  familyNameValidation();
  usernameValidation();
  emailValidation();
  emailConfirmationValidation();
  passwordValidation();
  passwordConfirmationValidation();
  checkboxValidation();


  if (Object.keys(validationErrors).length > 0) {
   

    event.preventDefault();

    // remove submit fail msg timer
    const removeSubmitMessage = () => {
      setTimeout(() => {
      document.querySelector('div.alert').remove();
      }   , 5000);
    };

    // create submit fail message
    const alert = document.createElement('div');
    alert.classList.add('alert');
    const alertMsg = document.createElement('p');
    alertMsg.innerText = '❗️ Please fill out all required fields correctly'
    alert.appendChild(alertMsg);
    document.querySelector('button.form-submit').after(alert);

    removeSubmitMessage();

    // console.error('there are still errors')
    // console.log(validationErrors);

  } else if(Object.keys(validationErrors).length === 0) {

    // remove submit fail message
    if (document.querySelector('div.alert')) {
      document.querySelector('div.alert').style.display = 'none';
    }
    // disable submit button to prevent double submit
    document.querySelector('button.submit').disabled = true;


    //send form (data object) to backend
    // console.log('sending form data to backend');




  }
});