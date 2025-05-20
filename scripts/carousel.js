const container = document.querySelector('.card-container');
const cards = document.querySelectorAll('.anime-card');
const prevBtn = document.querySelector('.prevBtn');
const nextBtn = document.querySelector('.nextBtn');

let scrollX = 0;


function updateCarousel() {
    if (container.scrollLeft === 0) {
        prevBtn.style.display = 'none';
    } else {
        prevBtn.style.display = 'flex';
    }
    container.scrollTo({
        left: scrollX,
        top: 0,
        behavior: 'smooth'
    });
}

nextBtn.addEventListener('click', () => {
    if (container.scrollLeft + container.clientWidth < container.scrollWidth) {
        scrollX += 260;
        updateCarousel();
    }
});

prevBtn.addEventListener('click', () => {
    if (container.scrollLeft > 0) {
        scrollX -= 260;
        updateCarousel();
    }
});

updateCarousel();