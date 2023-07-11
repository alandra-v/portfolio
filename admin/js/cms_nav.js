const navbar = document.querySelector('.navbar');
let prevScrollpos = window.pageYOffset;

const sidebar = document.querySelector('.sidebar');
const navToggles = document.querySelectorAll('.sidebar-toggle');

const subMenuTitles = document.querySelectorAll('.submenu-title');
const subMenuItems = document.querySelectorAll('.submenu-item');
const tooltips = document.querySelectorAll('span.tooltip');
const subMenus = document.querySelectorAll('.submenu');

const mobileToggle = document.querySelector('.sidebar-toggle-mobile');

const profileQuickNavToggle = document.querySelector('.active-admin-toggle');
const profileQuickNav = document.querySelector('.active-admin-quicknav');
const main = document.querySelector('main');


//**********************
// MOBILE NAVBAR SCROLL
//**********************
if (screen.width < 760) {
  window.addEventListener('scroll', () => {
    let currentScrollPos = window.pageYOffset;
    if (prevScrollpos < window.pageYOffset) {
      navbar.classList.add('hidden');
      profileQuickNav.classList.remove('open');
    } else {
      navbar.classList.remove('hidden');
    }
    prevScrollpos = currentScrollPos;
  });
}


//**********************
// SUBMENUS
//**********************
subMenuTitles.forEach((subMenuTitle) => {
  subMenuTitle.addEventListener('click', function () {
    if (screen.width < 760 || sidebar.classList.contains('open')) {
      openSubMenu(this, 'ul');
    } else {
      sidebar.classList.add('open');
      openSubMenu(this, 'ul');
      mobileToggle.classList.add('sidebaropen');
      tooltips.forEach((tip) => {
        tip.style.display = 'none';
      });
      navToggles.forEach((navToggle) => menuBtnChange(navToggle));
    }
  });

  function openSubMenu(element, selector) {
    let sibling = element.nextElementSibling;
    let parentHeight = sibling.closest('li').querySelector('a.submenu-title').offsetHeight;

    subMenuItems.forEach((item) => {
      item.style.display = 'flex';
    });

    if (sibling.matches(selector)) {
      if (sibling.classList.contains('open')) {
        sibling.setAttribute('closing', '');
        sibling.addEventListener('animationend', () => {
          sibling.removeAttribute('closing');
          sibling.classList.remove('open');
        }, { once: true });
        sibling.closest('li').animate([{ height: `${sibling.offsetHeight}px` }, { height: `${parentHeight}px` }], { duration: 800 });
      } else {
        sibling.classList.add('open');
        sibling.closest('li').animate([{ height: `${parentHeight}px` }, { height: `${sibling.offsetHeight}px` }], { duration: 600 });
      }
    }
  }
});


//**********************
// SIDEBAR NAVIGATION
//**********************
navToggles.forEach((navToggle) => {
  navToggle.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    mobileToggle.classList.toggle('sidebaropen');
    document.body.classList.toggle('overflow-hidden');
    

    if (screen.width < 760) {
      if (sidebar.classList.contains('open')) {
        main.classList.remove('backdrop');
        profileQuickNav.classList.remove('open');
        navbar.style.transition = 'none';
        navbar.style.background = 'transparent';
        mobileToggle.setAttribute('aria-label', 'close sidebar-navigation');
        profileQuickNavToggle.style.display = profileQuickNavToggle.style.display === 'none' ? 'block' : 'none';
      } else {
        navbar.style.transition = 'transform 0.3s';
        navbar.style.background = 'linear-gradient(rgba(2,43,40,1) 0%, rgba(4,78,72,1) 35%)';
        profileQuickNavToggle.style.display = 'block';
        mobileToggle.setAttribute('aria-label', 'open sidebar-navigation');
      }
    } else {
      if (sidebar.classList.contains('open')) {
        subMenuItems.forEach((item) => {
          item.style.display = 'flex';
        });
        tooltips.forEach((tip) => {
          tip.style.display = 'none';
        });
      } else {
        subMenuItems.forEach((item) => {
          item.style.display = 'none';
        });
        tooltips.forEach((tip) => {
          tip.style.display = 'block';
        });
      }
    }

    menuBtnChange(navToggle);
  });
});

function menuBtnChange(navToggle) {
  if (sidebar.classList.contains('open')) {
    navToggle.classList.replace('fa-bars', 'fa-chevron-left');
  } else {
    navToggle.classList.replace('fa-chevron-left', 'fa-bars');
    subMenus.forEach((subMenu) => {
      subMenu.classList.remove('open');
    });
  }
}


//**********************
// ACTIVE PROFILE
//**********************
profileQuickNavToggle.addEventListener('click', function () {
  if (profileQuickNav.classList.contains('open')) {
    closeProfileQuickNav();
  } else {
    profileQuickNav.classList.add('open');
    main.classList.add('backdrop');
    document.body.classList.add('overflow-hidden');
  }
});


function closeProfileQuickNav() {
  if (profileQuickNav.classList.contains('open')) {
    profileQuickNav.setAttribute('closing', '');
    main.classList.remove('backdrop');
    document.body.classList.remove('overflow-hidden');

    profileQuickNav.addEventListener('animationend', () => {
      profileQuickNav.removeAttribute('closing');
      profileQuickNav.classList.remove('open');
    }, { once: true });
  }
}

main.addEventListener('click', function() {
  closeProfileQuickNav();

  if (sidebar.classList.contains('open')) {
    sidebar.classList.remove('open');
    mobileToggle.classList.remove('sidebaropen');

    if (screen.width < 760) {
      main.classList.remove('backdrop');
      profileQuickNav.classList.remove('open');
      navbar.style.transition = 'none';
      navbar.style.background = 'transparent';
      mobileToggle.setAttribute('aria-label', 'close sidebar-navigation');
      profileQuickNavToggle.style.display = profileQuickNavToggle.style.display === 'none' ? 'block' : 'none';
    } else {
      subMenuItems.forEach((item) => {
        item.style.display = 'none';
      });
      tooltips.forEach((tip) => {
        tip.style.display = 'block';
      });
    }

    navToggles.forEach((navToggle) => {
    menuBtnChange(navToggle);
    });

  }
  });