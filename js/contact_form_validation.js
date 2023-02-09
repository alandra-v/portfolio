//**********************
// Variables
//**********************

// input fields
const titleInput = document.querySelector("#user-title");
const givenNameInput = document.querySelector("#given-name");
const familyNameInput = document.querySelector("#family-name");
const businessInput = document.querySelector("#business");
const addressInput = document.querySelector("#address");
const zipInput = document.querySelector("#zip");
const townInput = document.querySelector("#town");
const telInput = document.querySelector("#tel");
const emailInput = document.querySelector("#email");
const messageTextarea = document.querySelector("#message");
const fileInput = document.querySelector("#input-file");

// user input value collection
let title, givenName, familyName, address, town, zip, tel, email, message, file;
let data = {};
let validationErrors = {
  title,
  givenName,
  familyName,
  address,
  town,
  zip,
  tel,
  email,
  message,
};

business = businessInput.value;
file = fileInput.value;
// file input container (dropbox)
const dropbox = document.querySelector(".dropbox");

// console.log(fileInput.files)

// RegEx
const nameRegEx = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{1,}$/;
const emailRegEx =
  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
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

// display error messages
function displayErrorMsg(errorMessage, containerName, inputID) {
  const errorDisplay = document.createElement("span");
  errorDisplay.classList.add("error-span");
  errorDisplay.innerText = `${errorMessage}`;
  document.querySelector(`.${containerName} label`).after(errorDisplay);
  document.querySelector(`#${inputID}`).style.borderColor = "#F50404";
  document.querySelector(`.${containerName} select`).after(errorDisplay);
}

// valid input field style
function validStyle(inputID) {
  document.querySelector(`#${inputID}`).style.borderColor = "#008000";
}


// input field validations

function titleValidation() {
  detectErrorMsg("user-title-container");

  title = titleInput.value;
  if (title == "") {
    // console.error("No title provided");
    validationErrors.title = "Title is required";
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.title,
      "user-title-container",
      "user-title");
  } else {
    delete validationErrors.title;
    validStyle("user-title");
    // console.log(validationErrors);
  }
}


function givenNameValidation() {
  detectErrorMsg("given-name-container");


  givenName = givenNameInput.value;
  if (!givenName) {
    // console.error("No given name provided");
    validationErrors.givenName = "First name is required";
    detectErrorMsg("given-name");
    displayErrorMsg(
      validationErrors.givenName,
      "given-name-container",
      "given-name");
  } else {
    if (!nameRegEx.test(givenName)) {
      // console.error("Invalid given name");
      validationErrors.givenName = "Invalid format, please avoid special characters"
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
}


function familyNameValidation() {
  detectErrorMsg("family-name-container");

  familyName = familyNameInput.value;
  if (!familyName) {
    // console.error("No family name provided");
    validationErrors.familyName = "Last name is required";
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.familyName,
      "family-name-container",
      "family-name");
  } else {
    if (!nameRegEx.test(familyName)) {
      // console.error("Invalid family name");
      validationErrors.familyName = "Invalid format, please avoid special characters"
      detectErrorMsg();
      displayErrorMsg(
        validationErrors.familyName,
        "family-name-container",
        "family-name");
    }
    else {
      // console.info(`${familyName} is valid`);
      delete validationErrors.familyName;
      detectErrorMsg();
      validStyle("family-name");
      // console.log(validationErrors);
    }
  }
}


function addressValidation() {
  detectErrorMsg("address-container");

  address = addressInput.value;
  if (!address) {
    // console.error("No address provided");
    validationErrors.address = "Address is required";
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.address,
      "address-container",
      "address");
  } else {
    // console.info(`${address} is valid`);
    delete validationErrors.address;
    validStyle("address");
  }
}

function townValidation() {
  detectErrorMsg("town-container");

  town = townInput.value;
  if (!town) {
    // console.error("No town provided");
    validationErrors.town = "Town is required";
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.town,
      "town-container",
      "town");
  } else {
    // console.info(`${town} is valid`);
    delete validationErrors.town;
    validStyle("town");
  }
}


function zipValidation() {
  detectErrorMsg("zip-container");

  zip = zipInput.value;
  if (!zip) {
    // console.error("No zip provided");
    validationErrors.zip = "Postal code is required";
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.zip,
      "zip-container",
      "zip");
  } else {
    if (!
      (zipRegExGeneral.test(zip) ||
        zipRegExCanada.test(zip) ||
        zipRegExUK.test(zip)
      )
    ) {
      // console.error("Invalid zip");
      validationErrors.zip = "Invalid postal code";
      detectErrorMsg();
      displayErrorMsg(
        validationErrors.zip,
        "zip-container",
        "zip");
    } else {
      // console.info(`${zip} is valid`);
      delete validationErrors.zip;
      validStyle("zip");
    }
  }
}


function telValidation() {
  detectErrorMsg("tel-container");

  tel = telInput.value;
  if (!tel) {
    // console.error("No tel provided");
    validationErrors.tel = "Phone number is required";
    displayErrorMsg(
      validationErrors.tel,
      "tel-container",
      "tel");
  } else {
    if (!telRegEx.test(tel)) {
      // console.error("Invalid tel");
      validationErrors.tel = "Invalid format, please use 00 or + followed by country code";
      displayErrorMsg(
        validationErrors.tel,
        "tel-container",
        "tel");
    } else {
      // console.info(`${tel} is valid`);
      delete validationErrors.tel;
      validStyle("tel");
    }
  }
}


function emailValidation() {
  detectErrorMsg("email-container");

  email = emailInput.value;
  if (!email) {
    // console.error("No email provided");
    validationErrors.email = "Email address is required";
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


function messageValidation() {
  detectErrorMsg("message-container");

  message = messageTextarea.value;
  if (!message) {
    // console.error("No messgae provided");
    validationErrors.message = "Message is required";
    detectErrorMsg();
    displayErrorMsg(
      validationErrors.message,
      "message-container",
      "message");
  } else {
    if (message.length <= 30) {
      // console.error("Not enough characters.");
      validationErrors.message = "Not enough characters (min. 30)";
      detectErrorMsg();
      displayErrorMsg(
        validationErrors.message,
        "message-container",
        "message"
      );
    } else {
      // console.info("Message is valid");
      delete validationErrors.message;
      validStyle("message");
    }
  }
}

// console.log(fileInput.value)

// console.log(data);

//**********************
// EventListeners
//**********************

// input field validations
titleInput.addEventListener("focusout", titleValidation);
givenNameInput.addEventListener("focusout", givenNameValidation);
familyNameInput.addEventListener("focusout", familyNameValidation);
addressInput.addEventListener("focusout", addressValidation);
townInput.addEventListener("focusout", townValidation);
zipInput.addEventListener("focusout", zipValidation);
telInput.addEventListener("focusout", telValidation);
emailInput.addEventListener("focusout", emailValidation);
messageTextarea.addEventListener("focusout", messageValidation);

// file input drag and drop 

window.addEventListener("dragover", (event) => {
  // prevent file from being opened in browser
  event.preventDefault();
  // console.log("dragover");
  dropbox.classList.add("highlight");
});

window.addEventListener("dragleave", (event) => {
  // console.log("dragleave");
  dropbox.classList.remove("highlight");
});

window.addEventListener("drop", (event) => {
  // prevent file from being opened in browser
  event.preventDefault();
  // console.log("drop");
  dropbox.classList.remove("highlight");
  // process the drop
  [...event.dataTransfer.files].forEach((file, i) => {
    console.log(`… file[${i}].name = ${file.name}`);
  });
});


// form validation on "sumbit"
document.querySelector("form").addEventListener("submit", function (event) {

  event.preventDefault();

  titleValidation();

  // send data to backend
  if (Object.keys(validationErrors).length > 0) {
    alert("Please fill out all required fields correctly.")
    // displayErrors(validationErrors);
    console.error("there are still errors")
  } else {

    // disable submit button to prevent double submit
    document.querySelector("button.submit").disabled = true;

    data.title = title;
    data.givenName = givenName;
    data.familyName = familyName;
    data.business = business;
    data.address = address;
    data.town = town;
    data.zip = zip;
    data.tel = tel;
    data.email = email;
    data.message = message;
    data.file = file;

    //send form (data object) to backend
    console.log("sending form data to backend");

    // redirecting to contact reaction page 
    window.location.href = "/contact_reaction.html";

  }
});

// prevent user from being able to use browser back button when submitted the form
window.history.forward();


/*******************/
/* send animation */
/*******************/

// const animation = bodymovin.loadAnimation({
//   container: document.getElementsByClassName("animation-container"),
//   path: "../animations/send_animation.json",
//   loop: false,
//   autoplay: true,
//   name: "send animation",
// })
