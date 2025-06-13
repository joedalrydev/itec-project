document.querySelectorAll(".available-seat").forEach((seat) => {
  seat.addEventListener("click", function () {
    document.querySelectorAll(".available-seat.selected").forEach((seat) => {
      seat.classList.remove("selected");
    });
    this.classList.add("selected");
    document.getElementById("seat_id").value = this.id;
  });
});

document.getElementById("location").addEventListener("change", function () {
  document.getElementById("selected_location").value = this.value;
});
document.getElementById("date").addEventListener("change", function () {
  document.getElementById("selected_date").value = this.value;
});

document.addEventListener("DOMContentLoaded", function () {
  reservedSeats.forEach(function (seatId) {
    const seat = document.getElementById(seatId);
    if (seat) {
      seat.classList.remove("available-seat");
      seat.classList.add("sold");
    }
  });

  userSeats.forEach(function (seatId) {
      const seat = document.getElementById(seatId);
      if (seat) {
        seat.classList.remove("sold");
        seat.classList.remove("available-seat");
        seat.classList.add("user-seat");
      }
    });

  const saveBtn = document.querySelector('.save-button button[name="reservebtn"]');
  const modal = document.querySelector('.reserveModal');
  const closeModal = document.querySelector('.reserveModal .close');
  const form = document.querySelector('form');
  const seatDisplay = document.getElementById('seat-id-display');
  const locationDisplay = document.getElementById('location-display');
  const dateDisplay = document.getElementById('date-display');
  const confirmBtn = document.querySelector('.reserveModal button[name="confirmbtn"]');

  saveBtn.addEventListener('click', function(e) {
    e.preventDefault();

    const seatId = document.getElementById('seat_id').value;
    const location = document.getElementById('location').options[document.getElementById('location').selectedIndex].text;
    const date = document.getElementById('date').options[document.getElementById('date').selectedIndex].text;

    if (!seatId) {
      alert('Please select a seat.');
      return;
    }

    seatDisplay.textContent = seatId.toUpperCase();
    locationDisplay.textContent = location;
    dateDisplay.textContent = date;

    modal.style.display = 'block';
  });

  closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
  });

  confirmBtn.addEventListener('click', function() {
    form.submit();
  });

  window.addEventListener('click', function(e) {
    if (e.target === modal) {
      modal.style.display = 'none';
    }
  });
});
