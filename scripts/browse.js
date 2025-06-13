//kinukuha yung elements sa html
const container = document.getElementById("anime-list-container");
const text = document.getElementById("text");
const searchBar = document.getElementById("searchBar");

function loadCards(list) {
  //i-clear yung container bago i-load yung mga cards
  container.innerHTML = "";

  //dini-display yung mga cards kapag may laman yung list
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

//nagre-return ng list ng anime na nagma-match sa mga filters at sa search bar
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

//niru-run yung loadCards na function gamit yung list na nakuha sa getFilteredAnime na function
function filterAnime() {
  loadCards(getFilteredAnime());
}

//ni-rurun yung filterAnime na function kada enter ng letters sa search bar
searchBar.addEventListener("input", filterAnime);

//para ma-display yung cards pagka-load ng page habang wala pang filters
document.addEventListener("DOMContentLoaded", function() {
  filterAnime();
});