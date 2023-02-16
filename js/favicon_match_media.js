// css media matcher
let matchResult = window.matchMedia('(prefers-color-scheme: dark)');


// add / remove the elements from html head
lightSchemeIcon = document.querySelector('link#light-scheme-icon');
darkSchemeIcon = document.querySelector('link#dark-scheme-icon');

function onUpdate() {
  if (matchResult.matches) {
    lightSchemeIcon.remove();
    document.head.append(darkSchemeIcon);
    console.log("true");
  } else {
    document.head.append(lightSchemeIcon);
    darkSchemeIcon.remove();
    console.log("false");
  }
}