const navbar = document.querySelector(".navbar");
let prevScrollpos = window.pageYOffset;

const sidebar = document.querySelector(".sidebar");
const navToggles = document.querySelectorAll(".sidebar-toggle");

const subMenuTitles = document.querySelectorAll(".submenu-title");
const subMenus = document.querySelectorAll(".submenu");

const mobileToggle = document.querySelector(".sidebar-toggle-mobile");

const profileQuickNavToggle = document.querySelector(".active-admin-toggle");
const profileQuickNav = document.querySelector(".active-admin-quicknav");
const main = document.querySelector("main");

//**********************
// MOBILE NAVBAR SCROLL
//**********************

if (screen.width < 760) {
  window.onscroll = function () {
    let currentScrollPos = window.pageYOffset;
    if(prevScrollpos < window.pageYOffset) {
      navbar.classList.add("hidden");
      profileQuickNav.classList.remove("open");
    } else {
      navbar.classList.remove("hidden");
    }
    prevScrollpos = currentScrollPos;
  }
}



//**********************
// SUBNAVIGATIONS
//**********************

subMenuTitles.forEach(subMenuTitle => {

  subMenuTitle.addEventListener("click", function () {
    if (screen.width < 760) {
      openSubMenu(this, ("ul"));
    } else {
      
      if(sidebar.classList.contains("open")) {
        openSubMenu(this, ("ul"));
      } else {
        sidebar.classList.add("open");
        openSubMenu(this, "ul");
      }
    }
    
  });

  function openSubMenu(e, selector) {

    let sibling = e.nextElementSibling;
    let parentHeight = sibling.closest("li").querySelector("a.submenu-title").offsetHeight;
    // console.log(sibling.offsetHeight);
  
    if (sibling.matches(selector)) {

      if (sibling.classList.contains("open")) {
        sibling.setAttribute("closing", "");

        sibling.addEventListener("animationend", () => 
        {
          // console.log(sibling.offsetHeight);
          sibling.removeAttribute("closing");
          // console.log(sibling.offsetHeight);
          sibling.classList.remove("open");
          // console.log(sibling.offsetHeight)
        }, {once: true});
        // console.log(parentHeight);
        sibling.closest("li").animate([{height: `${sibling.offsetHeight}px`},{height: `${parentHeight}px`}], {duration: 800});

      } else {
        // console.log(sibling.closest("li").offsetHeight);

        sibling.classList.add("open");
        // console.log(parentHeight);
        sibling.closest("li").animate([{height: `${parentHeight}px`}, {height: `${sibling.offsetHeight}px`}], {duration: 600});

        // console.log(sibling.offsetHeight);
      }

    }

    
  }

});


//**********************
// SIDEBAR NAVIGATION
//**********************



navToggles.forEach( navToggle =>

  navToggle.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    mobileToggle.classList.toggle("sidebaropen");
    document.body.classList.toggle("overflow-hidden");
    
  
    if (screen.width < 760) {
      if(sidebar.classList.contains("open")) {
        navbar.style.transition = "none";
        navbar.style.background = "transparent";
        mobileToggle.setAttribute("aria-label", "close sidebar-navigation");
        if (profileQuickNavToggle.style.display === "none") {
          profileQuickNavToggle.style.display = "block";
        } else {
          profileQuickNavToggle.style.display = "none";
        }
      } else {
        navbar.style.transition = "transform 0.3s";
        navbar.style.background = "linear-gradient(rgba(2,43,40,1) 0%, rgba(4,78,72,1) 35%)";
        profileQuickNavToggle.style.display = "block";
        mobileToggle.setAttribute("aria-label", "open sidebar-navigation");
      }
    }
    
    menuBtnChange(navToggle);
  })
);


function menuBtnChange(navToggle) {
 if(sidebar.classList.contains("open")){
  navToggle.classList.replace("fa-bars", "fa-chevron-left");
 }else {
  navToggle.classList.replace("fa-chevron-left","fa-bars");
  subMenus.forEach((subMenu) => {
    subMenu.classList.remove("open");
  })
 }
}


//**********************
// ACTIVE PROFILE 
//**********************

profileQuickNavToggle.addEventListener("click", function () {

    if (profileQuickNav.classList.contains("open")) {
      profileQuickNav.setAttribute("closing", "");
      main.classList.remove("backdrop");
      
      profileQuickNav.addEventListener("animationend", () => {
        profileQuickNav.removeAttribute("closing");
        profileQuickNav.classList.remove("open");
      }, {once: true});
      // animation
    } else {
      profileQuickNav.classList.add("open");
      main.classList.add("backdrop");
      // animation
    }

});
