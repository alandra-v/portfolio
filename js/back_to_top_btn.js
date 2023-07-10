const scrollBtn = document.createElement('button');
scrollBtn.setAttribute('id', 'scroll-btn');
scrollBtn.setAttribute('aria-label', 'Scroll back to the top');
scrollBtn.innerHTML = `
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 124.1 111.47"><path d="m18.02 57.49 44.03-36.46 44.04 36.49c1.99 1.65 4.62 2.47 7.24 2.47s5.25-.83 7.25-2.49c4.01-3.32 4.01-8.7 0-12.02L69.31 2.99c-4.01-3.32-10.5-3.32-14.51 0L3.51 45.48c-4.01 3.32-4.01 8.7 0 12.02 4.01 3.32 10.5 3.31 14.51 0Zm51.28-3.51c-4.01-3.32-10.5-3.32-14.51 0L3.51 96.47c-4.01 3.32-4.01 8.7 0 12.02 4.01 3.32 10.5 3.32 14.51 0l44.04-36.47 44.04 36.49c1.99 1.65 4.62 2.47 7.24 2.47s5.25-.83 7.25-2.49c4.01-3.32 4.01-8.7 0-12.02l-51.3-42.48Z" style="stroke:#000;stroke-miterlimit:10"/></svg>
  `;
document.body.appendChild(scrollBtn);

scrollBtn.addEventListener('click', scrollToTop);
window.addEventListener('scroll', scrollBtnDisplay);


function scrollToTop() {
  window.scrollTo(0, 0);
}

function scrollBtnDisplay() {
  window.scrollY > window.innerHeight
    ? scrollBtn.classList.add('show')
    : scrollBtn.classList.remove('show');
}