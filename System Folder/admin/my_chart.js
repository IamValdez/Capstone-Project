var earningCanvas = document.getElementById("earning");
var earning = earningCanvas.getContext("2d");

var weeklyData = [18, 12, 15, 0, 18, 0, 9, 29, 8, 19];
var monthlyData = [12, 19, 12, 9, 5, 10, 12, 6, 16, 13];
var yearlyData = [70, 55, 45, 60];

var earningChart = new Chart(earning, {
  type: "bar",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "June",
      "Aug",
      "Sept",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        label: "Total of Student Appointments",
        data: monthlyData,
        borderColor: "rgb(154, 59, 59, 1)",
        backgroundColor: ["rgba(154, 59, 59, 1)", "rgba(255, 206, 86, 1)"],
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
          },
        },
      ],
    },
  },
});
function updateEarning(timePeriod) {
  switch (timePeriod) {
    case "week":
      earningChart.data.labels = Array.from(
        { length: 10 },
        (_, i) => "Week " + (i + 1)
      );
      earningChart.data.datasets[0].data = weeklyData;
      earningChart.data.datasets[0].label = "Total of Weekly Appointments";
      break;
    case "month":
      earningChart.data.labels = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "June",
        "Aug",
        "Sept",
        "Nov",
        "Dec",
      ];
      earningChart.data.datasets[0].data = monthlyData;
      earningChart.data.datasets[0].label = "Total of Monthly Appointments";
      break;
    case "year":
      earningChart.data.labels = ["2020", "2021", "2022", "2023"];
      earningChart.data.datasets[0].data = yearlyData;
      earningChart.data.datasets[0].label = "Total of Yearly Appointments";
      break;
    default:
      break;
  }

  earningChart.update();
}

function toggleDropdown() {
  var dropdownContent = document.getElementById("dropdowm-content");
  dropdownContent.style.display =
    dropdownContent.style.display === "block" ? "none" : "block";
}
