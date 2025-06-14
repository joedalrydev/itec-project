//nilagyan ng event listener yung mga available seat para mag-iba sila ng kulay pag na-click
document.querySelectorAll(".available-seat").forEach((seat) => {
  seat.addEventListener("click", function () {
    document.querySelectorAll(".available-seat.selected").forEach((seat) => {
      seat.classList.remove("selected");
    });
    this.classList.add("selected");
    document.getElementById("seat_id").value = this.id;
  });
});

//nilalagyan ng value yung selected location at date para magamit sa modal
document.getElementById("location").addEventListener("change", function () {
  document.getElementById("selected_location").value = this.value;
});
document.getElementById("date").addEventListener("change", function () {
  document.getElementById("selected_date").value = this.value;
});

document.addEventListener("DOMContentLoaded", function () {
  //ginagawang sold seats yung mga seat na na-reserve na ng ibang users
  reservedSeats.forEach(function (seatId) {
    const seat = document.getElementById(seatId);
    if (seat) {
      seat.classList.remove("available-seat");
      seat.classList.add("sold");
    }
  });

  //ginagawang user seats yung mga seat na na-reserve ng current user
  userSeats.forEach(function (seatId) {
    const seat = document.getElementById(seatId);
    if (seat) {
      seat.classList.remove("sold");
      seat.classList.remove("available-seat");
      seat.classList.add("user-seat");
    }
  });

  const bookModal = document.querySelector(".book-modal");
  const bookBtn = document.getElementById('bookModalBtn');
  const bookClose = document.querySelector(".book-modal .close");
  
  bookBtn.addEventListener("click", function (e) {
    e.preventDefault();

    //dini-display yung book modal
    bookModal.style.display = "block";
  });
  bookClose.addEventListener("click", function () {
    //kino-close yung book modal
    bookModal.style.display = "none";
  });
  window.addEventListener("click", function (e) {
    if (e.target === bookModal) {
      bookModal.style.display = "none";
    }
  });

  //kinukuha yung mga elements sa html
  const saveBtn = document.querySelector(
    '.save-button button[name="reservebtn"]'
  );
  const reserveModal = document.querySelector(".reserveModal");
  const closeModal = document.querySelector(".reserveModal .close");
  const form = document.querySelector("form");
  const seatDisplay = document.getElementById("seat-id-display");
  const locationDisplay = document.getElementById("location-display");
  const dateDisplay = document.getElementById("date-display");
  const confirmBtn = document.querySelector(
    '.reserveModal button[name="confirmbtn"]'
  );

  saveBtn.addEventListener("click", function (e) {
    //para hindi mag-refresh yung page kapag pinindot yung save button
    e.preventDefault();

    //kinukuha yung elements sa html
    const seatId = document.getElementById("seat_id").value;
    const location =
      document.getElementById("location").options[
        document.getElementById("location").selectedIndex
      ].text;
    const date =
      document.getElementById("date").options[
        document.getElementById("date").selectedIndex
      ].text;

    //may alert na nalabas kapag wala pang seat na napipili tapos pinindot yung save button
    if (!seatId) {
      alert("Please select a seat.");
      return;
    }

    //dini-display yung mga selected na seat, location, at date sa modal
    seatDisplay.textContent = seatId.toUpperCase();
    locationDisplay.textContent = location;
    dateDisplay.textContent = date;

    //dini-display yung modal
    reserveModal.style.display = "block";
  });

  //kino-close yung modal
  closeModal.addEventListener("click", function () {
    reserveModal.style.display = "none";
  });

  //para ma-submit yung form
  confirmBtn.addEventListener("click", function () {
    form.submit();
  });

  //nawawala yung modal kapag nag click sa labas ng modal
  window.addEventListener("click", function (e) {
    if (e.target === reserveModal) {
      reserveModal.style.display = "none";
    }
  });

});
