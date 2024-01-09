var ctx = document.getElementById("myChart").getContext("2d");
var myChart = new Chart(ctx, {
  type: "doughnut   ",
  data: {
    labels: ["Approved", "Cancelled", "Rescheduled"],
    datasets: [
      {
        label: "# of Appointments",
        data: [10, 12, 20],
        backgroundColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});
