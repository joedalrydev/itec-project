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
});
