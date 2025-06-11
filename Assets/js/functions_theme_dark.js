// Light Mode / Dark Mode
function darkModeTheme(el) {
    
  const body = document.getElementsByTagName('body')[0];
  const hr = document.querySelectorAll('div:not(.sidenav) > hr');
  const sidebar = document.querySelector('.sidenav');
  const sidebarWhite = document.querySelectorAll('.sidenav.bg-white');
  const hr_card = document.querySelectorAll('div:not(.bg-gradient-dark) hr');
  const text_btn = document.querySelectorAll('button:not(.btn) > .text-dark');
  const text_span = document.querySelectorAll('span.text-dark, .breadcrumb .text-dark');
  const text_span_white = document.querySelectorAll('span.text-white');
  const text_strong = document.querySelectorAll('strong.text-dark');
  const text_strong_white = document.querySelectorAll('strong.text-white');
  const text_nav_link = document.querySelectorAll('a.nav-link.text-dark');
  const secondary = document.querySelectorAll('.text-secondary');
  const bg_gray_100 = document.querySelectorAll('.bg-gray-100');
  const bg_gray_600 = document.querySelectorAll('.bg-gray-600');
  const btn_text_dark = document.querySelectorAll('.btn.btn-link.text-dark, .btn .ni.text-dark');
  const btn_text_white = document.querySelectorAll('.btn.btn-link.text-white, .btn .ni.text-white');
  const card_border = document.querySelectorAll('.card.border');
  const card_border_dark = document.querySelectorAll('.card.border.border-dark');
  const svg = document.querySelectorAll('g');
  const navLinks = document.querySelectorAll('.navbar-main .nav-link, .navbar-main .breadcrumb-item, .navbar-main .breadcrumb-item a, .navbar-main h6');
  const cardNavLinksIcons = document.querySelectorAll('.card .nav .nav-link i');
  const cardNavSpan = document.querySelectorAll('.card .nav .nav-link span');
  const base_url = document.getElementById('baseUrl').getAttribute('data-value');
  const navbarBrandImg = document.querySelector('.navbar-brand-img');
  const iconDiv = document.getElementById('iconTheme');
  const icon = iconDiv.querySelector('i');
  const bg_body = document.getElementById('BgBody');
  const contenidoFondo = document.getElementById('contenidoFondo');
  

  if (!el.getAttribute("checked")) {
    setCookie('dark-version');
    body.classList.add('dark-version');
    if (navbarBrandImg) {
      navbarBrandImg.setAttribute('src', base_url + '/Assets/img/brand/logo-adn-blanco.png');
    }
    if(bg_body) {
      bg_body.setAttribute('style', "background-image: url('"+base_url+"/Assets/img/dashboard-oscuro.png')");
    }
    if(contenidoFondo) {
      contenidoFondo.setAttribute('style', "background: linear-gradient(90deg, rgba(0, 0, 0, 1) 5%, rgb(85 100 151 / 82%) 50%, rgba(0, 0, 0, 1) 95%) !important;");
    }
    if (icon) {
      icon.classList.remove('fa-moon');
      icon.classList.add('fa-sun');
    }
    for (var i = 0; i < cardNavLinksIcons.length; i++) {
      if (cardNavLinksIcons[i].classList.contains('text-dark')) {
        cardNavLinksIcons[i].classList.remove('text-dark');
        cardNavLinksIcons[i].classList.add('text-white');
      }
    }
    for (var i = 0; i < cardNavSpan.length; i++) {
      if (cardNavSpan[i].classList.contains('text-sm')) {
        cardNavSpan[i].classList.add('text-white');
      }
    }
    for (var i = 0; i < hr.length; i++) {
      if (hr[i].classList.contains('dark')) {
        hr[i].classList.remove('dark');
        hr[i].classList.add('light');
      }
    }
    for (var i = 0; i < hr_card.length; i++) {
      if (hr_card[i].classList.contains('dark')) {
        hr_card[i].classList.remove('dark');
        hr_card[i].classList.add('light');
      }
    }
    for (var i = 0; i < text_btn.length; i++) {
      if (text_btn[i].classList.contains('text-dark')) {
        text_btn[i].classList.remove('text-dark');
        text_btn[i].classList.add('text-white');
      }
    }
    for (var i = 0; i < text_span.length; i++) {
      if (text_span[i].classList.contains('text-dark')) {
        text_span[i].classList.remove('text-dark');
        text_span[i].classList.add('text-white');
      }
    }
    for (var i = 0; i < text_strong.length; i++) {
      if (text_strong[i].classList.contains('text-dark')) {
        text_strong[i].classList.remove('text-dark');
        text_strong[i].classList.add('text-white');
      }
    }
    for (var i = 0; i < text_nav_link.length; i++) {
      if (text_nav_link[i].classList.contains('text-dark')) {
        text_nav_link[i].classList.remove('text-dark');
        text_nav_link[i].classList.add('text-white');
      }
    }
    for (var i = 0; i < secondary.length; i++) {
      if (secondary[i].classList.contains('text-secondary') && !secondary[i].classList.contains('fas')) {
        secondary[i].classList.remove('text-secondary');
        secondary[i].classList.add('text-white');
        secondary[i].classList.add('opacity-8');
      }
    }
    for (var i = 0; i < bg_gray_100.length; i++) {
      if (bg_gray_100[i].classList.contains('bg-gray-100')) {
        bg_gray_100[i].classList.remove('bg-gray-100');
        bg_gray_100[i].classList.add('bg-gray-600');
      }
    }
    for (var i = 0; i < btn_text_dark.length; i++) {
      btn_text_dark[i].classList.remove('text-dark');
      btn_text_dark[i].classList.add('text-white');
    }
    for (var i = 0; i < sidebarWhite.length; i++) {
      sidebarWhite[i].classList.remove('bg-white');
    }
    for (var i = 0; i < svg.length; i++) {
      if (svg[i].hasAttribute('fill')) {
        svg[i].setAttribute('fill', '#fff');
      }
    }
    for (var i = 0; i < card_border.length; i++) {
      card_border[i].classList.add('border-dark');
    }
    el.setAttribute("checked", "true");
  } else {
    setCookie('light-mode');
    body.classList.remove('dark-version');
    if (navbarBrandImg) {
      navbarBrandImg.setAttribute('src', base_url + '/Assets/img/brand/logo-adn-azul.png');
    }
    if(bg_body) {
      bg_body.setAttribute('style', "background-image: url('"+base_url+"/Assets/img/dashboard.png')");
    }
    if(contenidoFondo) {
      contenidoFondo.setAttribute('style', "background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%)");
    }
    if(sidebar){
      sidebar.classList.add('bg-white');
    }
    if (icon) {
      icon.classList.remove('fa-sun');
      icon.classList.add('fa-moon');
    }
    for (var i = 0; i < navLinks.length; i++) {
      if (navLinks[i].classList.contains('text-dark')) {
        navLinks[i].classList.add('text-white');
        navLinks[i].classList.remove('text-dark');
      }
    }
    for (var i = 0; i < cardNavLinksIcons.length; i++) {
      if (cardNavLinksIcons[i].classList.contains('text-white')) {
        cardNavLinksIcons[i].classList.remove('text-white');
        cardNavLinksIcons[i].classList.add('text-dark');
      }
    }
    for (var i = 0; i < cardNavSpan.length; i++) {
      if (cardNavSpan[i].classList.contains('text-white')) {
        cardNavSpan[i].classList.remove('text-white');
      }
    }
    for (var i = 0; i < hr.length; i++) {
      if (hr[i].classList.contains('light')) {
        hr[i].classList.add('dark');
        hr[i].classList.remove('light');
      }
    }
    for (var i = 0; i < hr_card.length; i++) {
      if (hr_card[i].classList.contains('light')) {
        hr_card[i].classList.add('dark');
        hr_card[i].classList.remove('light');
      }
    }
    for (var i = 0; i < text_btn.length; i++) {
      if (text_btn[i].classList.contains('text-white')) {
        text_btn[i].classList.remove('text-white');
        text_btn[i].classList.add('text-dark');
      }
    }
    for (var i = 0; i < text_span_white.length; i++) {
      if (text_span_white[i].classList.contains('text-white') && !text_span_white[i].closest('.sidenav') && !text_span_white[i].closest('.card.bg-gradient-dark')) {
        text_span_white[i].classList.remove('text-white');
        text_span_white[i].classList.add('text-dark');
      }
    }
    for (var i = 0; i < text_strong_white.length; i++) {
      if (text_strong_white[i].classList.contains('text-white')) {
        text_strong_white[i].classList.remove('text-white');
        text_strong_white[i].classList.add('text-dark');
      }
    }
    for (var i = 0; i < secondary.length; i++) {
      if (secondary[i].classList.contains('text-white')) {
        secondary[i].classList.remove('text-white');
        secondary[i].classList.remove('opacity-8');
        secondary[i].classList.add('text-dark');
      }
    }
    for (var i = 0; i < bg_gray_600.length; i++) {
      if (bg_gray_600[i].classList.contains('bg-gray-600')) {
        bg_gray_600[i].classList.remove('bg-gray-600');
        bg_gray_600[i].classList.add('bg-gray-100');
      }
    }
    for (var i = 0; i < svg.length; i++) {
      if (svg[i].hasAttribute('fill')) {
        svg[i].setAttribute('fill', '#252f40');
      }
    }
    for (var i = 0; i < btn_text_white.length; i++) {
      if (!btn_text_white[i].closest('.card.bg-gradient-dark')) {
        btn_text_white[i].classList.remove('text-white');
        btn_text_white[i].classList.add('text-dark');
      }
    }
    for (var i = 0; i < card_border_dark.length; i++) {
      card_border_dark[i].classList.remove('border-dark');
    }
    el.removeAttribute("checked");
  }
};

function setCookie(value) {
  document.cookie = 'theme' + "=" + (value || "") + "; path=/";
}

function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

document.addEventListener('DOMContentLoaded', function() {
  
  const existingCookie = getCookie('theme');
  if (!existingCookie) {
     setCookie('');
  }

  // Seleccionar el enlace con id BotonMenu
  const botonMenu = document.getElementById("dropdownMenuButton");

  if (botonMenu) {
      // Agregar el evento click
      botonMenu.addEventListener("click", function () {
          // Seleccionar el div con id listadoMenu
          const listadoMenu = document.getElementById("MenuToggleTopBar");
          if (listadoMenu) {
              // Quitar el atributo style
              listadoMenu.removeAttribute("style");
          }
      });
  }

});
