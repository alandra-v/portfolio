let favicon16x16 = document.getElementById("16");
let faviconICO = document.getElementById("ico");
const url = window.location.href;
const pathArray = window.location.pathname.split('/');
// console.log(pathArray);

const darkModeListener = (e) => {
  if (e.matches) {
    setWhite();
  } else {
    setBlack();
  }
}

// update favicon on mode change
window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", darkModeListener);

// check mode on load
if (window.matchMedia && window.matchMedia("(prefers-color-scheme:dark)").matches) {
  setWhite();
} else {
  setBlack();
}

function setWhite() {
  if (favicon16x16) {

    if (/admin/.test(url)) {
      if (pathArray.length = 4) {
        favicon16x16.setAttribute("href", "../assets/favicon/favicon-16x16-fff.png");
      } else if (pathArray.length = 5) {
      favicon16x16.setAttribute("href", "../../assets/favicon/favicon-16x16-fff.png");
      }
    } else {
      favicon16x16.setAttribute("href", "assets/favicon/favicon-16x16-fff.png");
    }

  }

  if (/admin/.test(url)) {
    if (pathArray.length = 4) {
      faviconICO.setAttribute("href", "../assets/favicon/favicon-fff.ico");
    } else if (pathArray.length = 5) {
      faviconICO.setAttribute("href", "../../assets/favicon/favicon-fff.ico");
    }
  } else {
    faviconICO.setAttribute("href", "assets/favicon/favicon-fff.ico");
  }
}

function setBlack() {
  if (favicon16x16) {
    if (/admin/.test(url)) {
      if (pathArray.length = 4) {
        favicon16x16.setAttribute("href", "../assets/favicon/favicon-16x16.png");
      } else if (pathArray.length = 5) {
        favicon16x16.setAttribute("href", "../../assets/favicon/favicon-16x16.png");
      }
    } else {
      favicon16x16.setAttribute("href", "assets/favicon/favicon-16x16.png");
    }

  }

  if (/admin/.test(url)) {
    if (pathArray.length = 4) {
      faviconICO.setAttribute("href", "../assets/favicon/favicon.ico");
    } else if (pathArray.length = 5) {
      faviconICO.setAttribute("href", "../../assets/favicon/favicon.ico");
    }
  } else {
    faviconICO.setAttribute("href", "assets/favicon/favicon.ico");
  }

}