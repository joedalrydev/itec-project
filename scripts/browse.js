const container = document.getElementById("anime-list-container");
const text = document.getElementById("text");

function loadCards() {
  container.innerHTML = "";

  if (animeList.length > 0) {
    text.style.display = "block";
    animeList.forEach((anime) => {
      const card = document.createElement("div");
      card.classList.add("card");
      card.innerHTML = `
        <a href="${anime.pathToReserve}"><img src="${anime.picture}" alt="Poster"></a>
        <a href="#">${anime.title}</a>
    `;
      container.appendChild(card);
    });
  } else {
    container.innerHTML = "<p>No anime in your list.</p>";
  }
}

function filterAnime() {
  const genre = document.getElementById("genre").value;
  const year = document.getElementById("year").value;
  const format = document.getElementById("format").value;

  container.innerHTML = "";

  const filtered = animeList.filter(anime => {
    const matchGenre = genre === "Any" || anime.genre === genre;
    const matchYear = year === "Any" || anime.year == year;
    const matchFormat = format === "Any" || anime.format === format;
    return matchGenre && matchYear && matchFormat;
  });

  if (filtered.length > 0) {
    text.style.display = "block";
    filtered.forEach(anime => {
      const card = document.createElement("div");
      card.classList.add("card");
      card.innerHTML = `
        <a href="${anime.pathToReserve}"><img src="${anime.picture}" alt="Poster"></a>
        <a href="#">${anime.title}</a>
      `;
      container.appendChild(card);
    });
  } else {
    text.style.display = "none";
    container.innerHTML = "<p>No anime in your list matches the filter.</p>";
  }
}

window.onload = loadCards();