  // Example of dynamic update flash effect (optional)
  function highlightCell(row, col) {
    const table = document.getElementById("financialTable");
    const cell = table.rows[row].cells[col];
    cell.classList.add("highlight");
    setTimeout(() => cell.classList.remove("highlight"), 1500);
  }

  // Example of triggering animation on load for demonstration
  highlightCell(1, 2); // Flash one value on load


const backBtn = document.getElementById('backBtn');
  if (backBtn) {
    backBtn.addEventListener('click', e => {
      e.preventDefault();
      window.location.href = "../index.html";
    });
  }