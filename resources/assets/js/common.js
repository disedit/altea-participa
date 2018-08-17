import SmoothScroll from 'smooth-scroll';
const scroll = new SmoothScroll('a[data-scroll]', {
  header: '.navbar',
  offset: 20
});

// Toggle Bootstrap menu without jQuery
let navbar = document.getElementsByClassName('navbar')[0],
    toggler = document.getElementsByClassName('navbar-toggler')[0],
    collapse = document.getElementsByClassName('navbar-collapse')[0];

function toggleMenu() {
  collapse.classList.toggle('collapse');
  collapse.classList.toggle('in');
  navbar.classList.toggle('navbar-expanded');
}

function closeMenusOnResize() {
  if (document.body.clientWidth >= 768) {
    collapse.classList.add('collapse');
    collapse.classList.remove('in');
    navbar.classList.remove('navbar-expanded');
  }
}

window.addEventListener('resize', closeMenusOnResize, false);
toggler.addEventListener('click', toggleMenu, false);

// Change nav background on scroll
function setNavbarBackground() {
  const doc = document.documentElement;
  const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

  if(top > 0) {
    navbar.classList.add('navbar-scrolled');
  } else {
    navbar.classList.remove('navbar-scrolled');
  }
}

window.addEventListener('scroll', setNavbarBackground);
window.addEventListener('DOMContentLoaded', setNavbarBackground, false);
