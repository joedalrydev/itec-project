function displayModal() {
  const modal = document.getElementById("addToListModal");
  const btn = document.getElementById("addToListBtn");
  const closeBtn = document.querySelector(".close");

  btn.onclick = function () {
    modal.style.display = "block";
  };

  closeBtn.onclick = function () {
    modal.style.display = "none";
  };

  window.onclick = function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };

  const form = document.getElementById("addToListForm");
  form.onsubmit = function (event) {
    modal.style.display = "none";
  };
}

function toggleAvatarHover() {
  const popup = document.getElementById("avatarHover");
  const avatar = document.getElementById("profilepic");

  if (!popup || !avatar) return;

  avatar.onclick = function () {
    if (popup.style.display === "none") {
      popup.style.display = "block";
      avatar.style.boxShadow = " 0 0 5px #67ebff";
    } else {
      popup.style.display = "none";
      avatar.style.boxShadow = "none";
    }
  };
}

function displayMenu() {
  const menuBtn = document.getElementById("menu");
  const menuSidebar = document.getElementById("menu-sidebar");
  const closeBtn = document.getElementById("close");

  menuBtn.onclick = function () {
    menuBtn.style.display = "none";
    menuSidebar.style.display = "block";
  };
  closeBtn.onclick = function () {
    menuSidebar.style.display = "none";
    menuBtn.style.display = "block";
  };

  window.onclick = function (event) {
    if (event.target === menuSidebar) {
      menuSidebar.style.display = "none";
      menuBtn.style.display = "block";
    }
  };
}

const originalColors = {
  '--color-main-bg1': 'rgba(5, 24, 52, 1)',
  '--color-main-bg2': 'rgb(46, 21, 109)',
  '--color-blue': '#67ebff',
  '--color-gradient-start': '#0fb5ce',
  '--color-gradient-end': '#6d3ee4',
  '--color-bg1': '#281558',
  '--color-bg2': '#043a42',
  '--color-login-1': '#67ebff',
  '--color-login-2': '#1e90ff',
  '--color-purple-accent': '#a259ff',
  '--color-bg-gradient1': '#0a6a79',
  '--color-bg-gradient2': '#3c237c'
};
const toggledColors = {
  '--color-main-bg1': '#661d1d',
  '--color-main-bg2': '#4e1818',
  '--color-blue': '#ff864a',
  '--color-gradient-start': '#ff3131',
  '--color-gradient-end': '#ff914d',
  '--color-bg1': '#ff3131',
  '--color-bg2': '#ff914d',
  '--color-login-1': '#eb3328',
  '--color-login-2': '#ff864a',
  '--color-purple-accent': '#eb3328',
  '--color-bg-gradient1': '#8f2828',
  '--color-bg-gradient2': '#692402'
};

let isToggled = localStorage.getItem('colorToggled') === 'true';

function applyColors(colors) {
  for (const [key, value] of Object.entries(colors)) {
    document.documentElement.style.setProperty(key, value);
  }
}
applyColors(isToggled ? toggledColors : originalColors);

document.getElementById('color-toggle').addEventListener('click', function() {
  isToggled = !isToggled;
  applyColors(isToggled ? toggledColors : originalColors);
  localStorage.setItem('colorToggled', isToggled);
});

document.addEventListener("DOMContentLoaded", function() {
  toggleAvatarHover();
  displayMenu();
});
