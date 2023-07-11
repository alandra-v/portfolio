//**********************
// Variables
//**********************

// input fields
const titleInput = document.querySelector('#user-title');
const givenNameInput = document.querySelector('#given-name');
const familyNameInput = document.querySelector('#family-name');
const businessInput = document.querySelector('#business');
const addressInput = document.querySelector('#address');
const zipInput = document.querySelector('#zip');
const townInput = document.querySelector('#town');
const telInput = document.querySelector('#tel');
const emailInput = document.querySelector('#email');
const messageTextarea = document.querySelector('#message');
// const fileInput = document.querySelector('#input-file');
const termsInput = document.querySelector('#terms');

const validColor = '#008000';
const errorColor = '#F50404';

// user input value collection
let title, givenName, familyName, address, zip, town, tel, email, message, file;
// let data = {};
let validationErrors = {
  title,
  givenName,
  familyName,
  address,
  zip,
  town,
  tel,
  email,
  message,
  terms
};

business = businessInput.value;
// file = fileInput.value;
// file input container (dropbox)
// const dropbox = document.querySelector('.dropbox');

// console.log(fileInput.files)

// RegEx
const nameRegEx = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{1,}$/;
const emailRegEx =
  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
const telRegEx = /^(\+|00)(?:[0-9] ?){6,14}[0-9]$/;
const zipRegExGeneral = /^[a-z0-9][a-z0-9\- ]{0,10}[a-z0-9]$/;
const zipRegExCanada = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
const zipRegExUK =
  /^([A-Za-z][A-Ha-hJ-Yj-y]?[0-9][A-Za-z0-9]? ?[0-9][A-Za-z]{2}|[Gg][Ii][Rr] ?0[Aa]{2})$/;



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
function displayErrorMsg(errorMessage, containerName, inputID, selector = 'label') {
  const errorDisplay = createErrorSpan(errorMessage);
  document.querySelector(`.${containerName} ${selector}`).after(errorDisplay);
  document.querySelector(`#${inputID}`).style.borderColor = errorColor;
  document.querySelector(`#${inputID}`).setAttribute('aria-invalid', 'true');
}

// display error message checkbox
function displayErrorMsgCheckbox(errorMessage, containerName) {
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
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.title,
      'user-title-container',
      'user-title',
      'select');
  } else {
    delete validationErrors.title;
    validStyle('user-title');
    // console.log(validationErrors);
  }
}


function givenNameValidation() {
  detectErrorMsg('given-name-container');


  givenName = givenNameInput.value;
  if (!givenName) {
    // console.error('No given name provided');
    validationErrors.givenName = 'Please enter your first name';
    detectErrorMsg('given-name');
    displayErrorMsg(
      validationErrors.givenName,
      'given-name-container',
      'given-name');
  } else {
    if (!nameRegEx.test(givenName)) {
      // console.error('Invalid given name');
      validationErrors.givenName = 'Invalid format, please avoid special characters'
      detectErrorMsg('given-name');
      displayErrorMsg(
        validationErrors.givenName,
        'given-name-container',
        'given-name');
    } else {
      // console.info(`${givenName} is valid`);
      delete validationErrors.givenName;
      detectErrorMsg();
      validStyle('given-name');
      // console.log(validationErrors);
    }
  }
}


function familyNameValidation() {
  detectErrorMsg('family-name-container');

  familyName = familyNameInput.value;
  if (!familyName) {
    // console.error('No family name provided');
    validationErrors.familyName = 'Please enter your last name';
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.familyName,
      'family-name-container',
      'family-name');
  } else {
    if (!nameRegEx.test(familyName)) {
      // console.error('Invalid family name');
      validationErrors.familyName = 'Invalid format, please avoid special characters'
      detectErrorMsg();
      displayErrorMsg(
        validationErrors.familyName,
        'family-name-container',
        'family-name');
    }
    else {
      // console.info(`${familyName} is valid`);
      delete validationErrors.familyName;
      detectErrorMsg();
      validStyle('family-name');
      // console.log(validationErrors);
    }
  }
}

/* NOTE */
// in the future the address input will be validated by google address validation API
// it will fix missing, unconfirmed and malformed address components

function addressValidation() {
  detectErrorMsg('address-container');

  address = addressInput.value;
  if (!address) {
    // console.error('No address provided');
    validationErrors.address = 'Please enter your address';
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.address,
      'address-container',
      'address');
  } else {
    // console.info(`${address} is valid`);
    delete validationErrors.address;
    validStyle('address');
  }
}

/* NOTE */
// in the future the zip input will be validated by google address validation API
// instead of regular expressions
// respectively autocompleted from an individual component of the address input data

function zipValidation() {
  detectErrorMsg('zip-container');

  zip = zipInput.value;
  if (!zip) {
    // console.error('No zip provided');
    validationErrors.zip = 'Please enter your postal code';
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.zip,
      'zip-container',
      'zip');
  } else {
    if (!
      (zipRegExGeneral.test(zip) ||
        zipRegExCanada.test(zip) ||
        zipRegExUK.test(zip)
      )
    ) {
      // console.error('Invalid zip');
      validationErrors.zip = 'Invalid postal code';
      detectErrorMsg();
      displayErrorMsg(
        validationErrors.zip,
        'zip-container',
        'zip');
    } else {
      // console.info(`${zip} is valid`);
      delete validationErrors.zip;
      validStyle('zip');
    }
  }
}

/* NOTE */
// in the future the town input will be validated by google address validation API
// respectively autocompleted from an individual component of the address input data

function townValidation() {
  detectErrorMsg('town-container');

  town = townInput.value;
  if (!town) {
    // console.error('No town provided');
    validationErrors.town = 'Please enter your town';
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.town,
      'town-container',
      'town');
  } else {
    // console.info(`${town} is valid`);
    delete validationErrors.town;
    validStyle('town');
  }
}


function telValidation() {
  detectErrorMsg('tel-container');

  tel = telInput.value;
  if (!tel) {
    // console.error('No tel provided');
    validationErrors.tel = 'Please enter your phone number';
    displayErrorMsg(
      validationErrors.tel,
      'tel-container',
      'tel');
  } else {
    if (!telRegEx.test(tel)) {
      // console.error('Invalid tel');
      validationErrors.tel = 'Invalid format, please use 00 or + followed by country code';
      displayErrorMsg(
        validationErrors.tel,
        'tel-container',
        'tel');
    } else {
      // console.info(`${tel} is valid`);
      delete validationErrors.tel;
      validStyle('tel');
    }
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


function messageValidation() {
  detectErrorMsg('message-container');

  message = messageTextarea.value;
  if (!message) {
    // console.error('No message provided');
    validationErrors.message = 'Please enter your message';
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.message,
      'message-container',
      'message');
  } else {
    if (message.length <= 30) {
      // console.error('Not enough characters.');
      validationErrors.message = 'Not enough characters (min. 30)';
      detectErrorMsg();
      displayErrorMsg(
        validationErrors.message,
        'message-container',
        'message'
      );
    } else {
      // console.info('Message is valid');
      delete validationErrors.message;
      validStyle('message');
    }
  }
}

// console.log(fileInput.value)

// console.log(data);

function checkboxValidation() {

  detectErrorMsg('terms-label-container');

  if (!termsInput.checked) {
    validationErrors.terms = 'Please accept the Privacy Policy';
    detectErrorMsg('terms-label-container');
    displayErrorMsgCheckbox(
      validationErrors.terms,
      'terms-container');
  } else {
    delete validationErrors.terms;
  }

}

//**********************
// EventListeners
//**********************

// input field validations
titleInput.addEventListener('focusout', titleValidation);
givenNameInput.addEventListener('focusout', givenNameValidation);
familyNameInput.addEventListener('focusout', familyNameValidation);
addressInput.addEventListener('focusout', addressValidation);
zipInput.addEventListener('focusout', zipValidation);
townInput.addEventListener('focusout', townValidation);
telInput.addEventListener('focusout', telValidation);
emailInput.addEventListener('focusout', emailValidation);
messageTextarea.addEventListener('focusout', messageValidation);

/* FILE INPUT DRAG AND DROP */
/* NOTE */
/* will be fully implemented and validated at a later stage */

// to check if browser supports drag and drop:

// const isAdvancedUpload = function () {
//   let div = document.createElement('div');
//   return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
// }();

// if (isAdvancedUpload) {
// console.log('this browser supports advanced upload');

// dropbox.addEventListener('dragover', (event) => {
//   // prevent file from being opened in browser
//   event.preventDefault();
//   // console.log('dragover');
//   dropbox.classList.add('highlight');
// });

// dropbox.addEventListener('dragleave', () => {
//   // console.log('dragleave');
//   dropbox.classList.remove('highlight');
// });

// dropbox.addEventListener('drop', (event) => {
//   // console.log('drop');
//   dropbox.classList.remove('highlight');
//   // process the drop
//   [...event.dataTransfer.files].forEach((file, i) => {
//     // console.log(`… file[${i}].name = ${file.name}`);
//   });
//   // handleFiles();
//   // upload dragged&dropped files with e.g. ajax
// });

// }


// form validation on 'submit'
document.querySelector('form').addEventListener('submit', function (event) {

  titleValidation();
  givenNameValidation();
  familyNameValidation();
  addressValidation();
  zipValidation();
  townValidation();
  telValidation();
  emailValidation();
  messageValidation();
  checkboxValidation();

  // send data to backend
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
    document.querySelector('div.form-buttons').after(alert);

    removeSubmitMessage();
    // console.error('there are still errors')
  } else if(Object.keys(validationErrors).length === 0) {

    // remove submit fail message
    if (document.querySelector('div.alert')) {
      document.querySelector('div.alert').style.display = 'none';
    }
    // disable submit button to prevent double submit
    document.querySelector('button.submit').disabled = true;

    //send form (data object) to backend
    // console.log('sending form data to backend');

    // play send animation
    animation.play()
    setTimeout(() => {}, 2000)

  }
});


/*******************/
/* send animation */
/*******************/

let animation = lottie.loadAnimation({
  container: document.getElementById('lottie-container'),
  renderer: 'svg',
  loop: false,
  autoplay: false,
  path: 'assets/animation/send_animation.json',
});
