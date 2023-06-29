//*****************************
// Password visibility toggle
//*****************************

const passwordToggles = document.querySelectorAll(".password-toggle");
const passwordTogglesArr = [...passwordToggles];

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

//*****************************
// Password requirements
//*****************************

// functions

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
  passwordInput.after(requirementsContainer);

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

// event listeners

passwordInput.addEventListener("focusin", createRequirements);
passwordInput.addEventListener("focusout", removeRequirementsContainer);
passwordInput.addEventListener("keyup", () => {
  updateRequirementsList(requirementsList);

});