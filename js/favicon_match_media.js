let favicon16x16 = document.getElementById("16");
let faviconICO = document.getElementById("ico");

const darkModeListener = (e) => {
  if (e.matches) {
    console.log("dark");
    favicon16x16.setAttribute("href", "assets/favicon/favicon-16x16-fff.png");
    faviconICO.setAttribute("href", "assets/favicon/favicon-fff.ico");
  } else {
    console.log("light");
    favicon16x16.setAttribute("href", "iassets/favicon/favicon-16x16.png");
    faviconICO.setAttribute("href", "assets/favicon/favicon.ico");
  }
}

// update favicon on mode change
window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", darkModeListener);

// check mode on load
if (window.matchMedia && window.matchMedia("(prefers-color-scheme:dark)").matches) {
  favicon16x16.setAttribute("href", "iassets/favicon/favicon-16x16-fff.png");
  faviconICO.setAttribute("href", "assets/favicon/favicon-fff.ico");
} else {
  favicon16x16.setAttribute("href", "assets/favicon/favicon-16x16.png");
  faviconICO.setAttribute("href", "assets/favicon/favicon.ico");
}