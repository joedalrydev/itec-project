const container = document.getElementById("anime-list-container");
const text = document.getElementById("text");
const searchBar = document.getElementById("searchBar");

function renderCards(list) {
  container.innerHTML = "";

  if (list.length > 0) {
    text.style.display = "block";
    list.forEach((anime) => {
      const card = document.createElement("div");
      card.classList.add("card");
      card.innerHTML = `
        <a href="${anime.path_to_reserve}"><img src="${anime.picture}" alt="Poster"></a>
        <a href="#">${anime.title}</a>
      `;
      container.appendChild(card);
    });
  } else {
    text.style.display = "none";
    container.innerHTML = "<p>No anime in your list matches the filter.</p>";
  }
}

function getFilteredAnime() {
  const genre = document.getElementById("genre").value;
  const year = document.getElementById("year").value;
  const format = document.getElementById("format").value;
  const searchTerm = searchBar.value.toLowerCase();

  return animeList.filter(anime => {
    const matchGenre = genre === "Any" || anime.genre.includes(genre);
    const matchYear = year === "Any" || anime.year == year;
    const matchFormat = format === "Any" || anime.format === format;
    const matchTitle = anime.title.toLowerCase().includes(searchTerm);
    return matchGenre && matchYear && matchFormat && matchTitle;
  });
}

searchBar.addEventListener("input", function () {
  const searchTerm = searchBar.value.toLowerCase();
  const filtered = animeList.filter(anime =>
    anime.title.toLowerCase().includes(searchTerm)
  );
  filterAnime();
});

function filterAnime() {
  renderCards(getFilteredAnime());
}

searchBar.addEventListener("input", filterAnime);

document.addEventListener("DOMContentLoaded", function() {
  filterAnime();
});