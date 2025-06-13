//kinukuha yung mga elements sa html
const container = document.querySelector('.card-container');
const cards = document.querySelectorAll('.anime-card');
const prevBtn = document.querySelector('.prevBtn');
const nextBtn = document.querySelector('.nextBtn');

//para malaman kung gaano kahaba yung i-scroll
let scrollX = 0;


function updateCarousel() {
    //nawawala yung prev button kapag hindi na pwede i-scroll pa sa left
    if (container.scrollLeft === 0) {
        prevBtn.style.display = 'none';
    } else {
        prevBtn.style.display = 'flex';
    }
    //inii-scroll yung container
    container.scrollTo({
        left: scrollX,
        top: 0,
        behavior: 'smooth'
    });
}

//nag-add ng event listener para gumalaw yung carousel
nextBtn.addEventListener('click', () => {
    if (container.scrollLeft + container.clientWidth < container.scrollWidth) {
        //dinagdagan yung scrollX para mag scroll sa kanan
        scrollX += 260;
        updateCarousel();
    }
});

prevBtn.addEventListener('click', () => {
    if (container.scrollLeft > 0) {
        //binawasan yung scrollX para mag scroll sa kaliwa
        scrollX -= 260;
        updateCarousel();
    }
});

updateCarousel();