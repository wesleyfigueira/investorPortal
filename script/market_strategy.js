  function setupRowHighlight(tableId){
    const table = document.getElementById(tableId);
    const rows = table.querySelectorAll("tbody tr");

    rows.forEach(row => {
      row.addEventListener("click", () => {
        row.classList.add("highlight");
        setTimeout(() => row.classList.remove("highlight"), 1400);
      });
    });
  }

  setupRowHighlight("strategyTable");
  setupRowHighlight("arrTable");