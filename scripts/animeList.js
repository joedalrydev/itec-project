const animeListContainer = document.getElementById("anime-list");
const searchBar = document.getElementById("searchBar");

function renderTable(list) {
  animeListContainer.innerHTML = "";
  animeListContainer.querySelectorAll("table").forEach(t => t.remove());
  if (list.length > 0) {
    const table = document.createElement("table");
    table.classList.add("anime-table");

    const headerRow = document.createElement("tr");
    headerRow.innerHTML = `
      <th><h3>Title</h3></th>
      <th><h3>Score</h3></th>
      <th><h3>Episodes</h3></th>
      <th><h3>Status</h3></th>
      <th><h3>Genre</h3></th>
      <th><h3>Year</h3></th>
    `;
    table.appendChild(headerRow);

    list.forEach((anime) => {
      const row = document.createElement("tr");
      row.innerHTML = `
        <td class="anime-picture"><img src="${anime.picture}" width="50px" height="50px"><p>${anime.title}</p></td>
        <td><p>${anime.score}/10</p></td>
        <td class="episodes-wrapper">
          <div class="episodes">
              <p>
                  ${anime.episodes} / ${anime.max_episodes}
                  <div class="update-episodes">
                    <i class="fa fa-arrow-up" id="addEpisode"></i>
                    <i class="fa fa-arrow-down" id="removeEpisode"></i>
                  </div>
              </p>
          </div>
        </td>
        <td><p>${anime.status}</p></td>
        <td><p>${anime.genre}</p></td>
        <td><p>${anime.year}</p></td>
      `;
      table.appendChild(row);
    });

    animeListContainer.appendChild(table);
  } else {
    animeListContainer.innerHTML = "<p>No anime in your list.</p>";
  }
}

renderTable(animeList);

searchBar.addEventListener("input", function () {
  const searchTerm = searchBar.value.toLowerCase();
  const filtered = animeList.filter(anime =>
    anime.title.toLowerCase().includes(searchTerm)
  );
  renderTable(filtered);
});

const addEpisodeBtn = document.querySelectorAll("#addEpisode");
const removeEpisodeBtn = document.querySelectorAll("#removeEpisode");

addEpisodeBtn.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    const episodesElement = btn.closest(".episodes");
    const currentEpisodes = parseInt(episodesElement.querySelector("p").textContent.split("/")[0]);
    const maxEpisodes = parseInt(episodesElement.querySelector("p").textContent.split("/")[1]);

    if (currentEpisodes < maxEpisodes) {
      episodesElement.querySelector("p").textContent = `${currentEpisodes + 1} / ${maxEpisodes}`;
    }
  });
}
);
removeEpisodeBtn.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    const episodesElement = btn.closest(".episodes");
    const currentEpisodes = parseInt(episodesElement.querySelector("p").textContent.split("/")[0]);

    if (currentEpisodes > 0) {
      episodesElement.querySelector("p").textContent = `${currentEpisodes - 1} / ${episodesElement.querySelector("p").textContent.split("/")[1]}`;
    }
  });
});