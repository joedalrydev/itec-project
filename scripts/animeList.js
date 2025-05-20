const animeListContainer = document.getElementById("anime-list");

if (animeList.length > 0) {
  const table = document.createElement("table");
  table.classList.add("anime-table");

  const headerRow = document.createElement("tr");
  headerRow.innerHTML = `
    <th colspan="10"><h3>Title</h3></th>
    <th><h3>Score</h3></th>
    <th><h3>Status</h3></th>
    <th><h3>Genre</h3></th>
    <th><h3>Year</h3></th>
    <th><h3>Season</h3></th>
  `;
  table.appendChild(headerRow);

  animeList.forEach((anime) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td colspan="10"><p>${anime.title}</p></td>
      <td><p>${anime.score}</p></td>
      <td><p>${anime.status}</p></td>
      <td><p>${anime.genre}</p></td>
      <td><p>${anime.year}</p></td>
      <td><p>${anime.season}</p></td>
    `;
    table.appendChild(row);
  });

  // Append the table to the container
  animeListContainer.appendChild(table);
} else {
  animeListContainer.innerHTML = "<p>No anime in your list.</p>";
}
