//**********************
// Variables
//**********************

const usernameInput = document.querySelector("#username-email");
const submitBtn = document.querySelector("button.reset-password");

//**********************
// Event Listeners
//**********************

document.querySelector("form").addEventListener("submit", function (event) {

  event.preventDefault();

  // remove submit error msg timer
  const removeSubmitMessage = () => {
    setTimeout(() => {
    document.querySelector("div.alert").remove();
    submitBtn.disabled = false;
    }   , 5000);
  };

  if (!usernameInput.value) {

      // create submit error msg
      const alert = document.createElement("div");
      alert.classList.add("alert");
      const alertMsg = document.createElement("p");
      alertMsg.innerText = "❗️ Please enter your username or email"
      alert.appendChild(alertMsg);
      usernameInput.after(alert);
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