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

document.addEventListener("DOMContentLoaded", function() {
  displayMenu();
});
