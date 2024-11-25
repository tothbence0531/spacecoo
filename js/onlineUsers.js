const toggleButton = document.querySelector(".online-users-toggle");
const onlineUsersDiv = document.querySelector(".online-users-container");

toggleButton.addEventListener("click", () => {
  onlineUsersDiv.classList.toggle("hidden");
  onlineUsersDiv.classList.toggle("shown");
});
