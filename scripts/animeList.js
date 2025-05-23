const animeListContainer = document.getElementById("anime-list");

if (animeList.length > 0) {
  const table = document.createElement("table");
  table.classList.add("anime-table");

  const headerRow = document.createElement("tr");
  headerRow.innerHTML = `
    <th><h3>Title</h3></th>
    <th><h3>Score</h3></th>
    <th><h3>Status</h3></th>
    <th><h3>Genre</h3></th>
    <th><h3>Year</h3></th>
  `;
  table.appendChild(headerRow);

  animeList.forEach((anime) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td class="anime-picture"><img src="${anime.picture}" width="50px" height="50px"><p>${anime.title}</p></td>
      <td><p>${anime.score}/10</p></td>
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
