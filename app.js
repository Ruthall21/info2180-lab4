document.addEventListener("DOMContentLoaded", () => {
  const searchBtn = document.getElementById("searchBtn");
  const searchField = document.getElementById("searchField");
  const resultDiv = document.getElementById("result");

  searchBtn.addEventListener("click", () => {
    const query = searchField.value.trim();
    const url = query
      ? `superheroes.php?query=${encodeURIComponent(query)}`
      : "superheroes.php";

    // Make AJAX call
    fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.text();
      })
      .then(data => {
        resultDiv.innerHTML = data;
      })
      .catch(error => {
        console.error("Error:", error);
        resultDiv.innerHTML = "<p>There was an error fetching the superhero data.</p>";
      });
  });
});
