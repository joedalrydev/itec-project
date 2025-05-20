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

    alert("Anime added to your list!");
  };
}
