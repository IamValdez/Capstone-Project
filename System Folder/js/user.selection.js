const userIcons = document.querySelectorAll(".user-icon");
const nextButton = document.querySelector(".next-button");

userIcons.forEach((icon) => {
  icon.addEventListener("click", () => {
    userIcons.forEach((i) => i.classList.remove("selected"));
    icon.classList.add("selected");
    nextButton.removeAttribute("disabled");
  });
});

nextButton.addEventListener("click", () => {
  const selectedUserType = document
    .querySelector(".user-icon.selected")
    .getAttribute("data-type");
  redirectToLogin(selectedUserType);
});

function redirectToLogin(selectedUserType) {
  switch (selectedUserType) {
    case "Student":
      window.location.href = "a-student/login.php";
      break;
    case "Teacher":
      window.location.href = "faculty/login.php";
      break;
    case "Admin":
      window.location.href = "admin/login.php";
      break;
    default:
      alert("Invalid user type selected");
  }
}
