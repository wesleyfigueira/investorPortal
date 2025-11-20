  document.addEventListener("DOMContentLoaded", () => {

    const ctx = document.getElementById("marketChart");

    new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: [
          "All Public-Facing ($4.2B)",
          "Hospitality + Retail ($636M)",
          "Hospitality Only ($294M)"
        ],
        datasets: [
          {
            data: [4200, 636, 294],
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "bottom"
          }
        }
      }
    });
  });