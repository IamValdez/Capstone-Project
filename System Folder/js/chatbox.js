// index.js
var chatBotResponded = false;

document.addEventListener("DOMContentLoaded", function () {
  var chatContent = document.getElementById("chatContent");
  var storedMessages = localStorage.getItem("chatMessages");
  if (storedMessages) {
    chatContent.innerHTML = storedMessages;
  }
});

function toggleMessageBox() {
  var messageBox = document.getElementById("messageBox");
  var chatContent = document.getElementById("chatContent");

  // Toggle the visibility of the message box
  messageBox.style.display =
    messageBox.style.display === "none" || messageBox.style.display === ""
      ? "block"
      : "none";

  // Delay the appearance of the chat content by 5 seconds
  if (messageBox.style.display === "block") {
    setTimeout(function () {
      // Create a div to contain the logo and online indicator
      var logoContainer = document.createElement("div");
      logoContainer.style.position = "relative";
      logoContainer.style.display = "inline-block";

      // Add the logo image to the container
      var logoImage = document.createElement("img");
      logoImage.src = "./images/title/logo.jpg";
      logoImage.alt = "Admin Icon";
      logoImage.className = "profile-icon";
      logoImage.style.width = "33px";
      logoContainer.appendChild(logoImage);

      // Add the black online indicator
      var onlineIndicator = document.createElement("div");
      onlineIndicator.style.position = "absolute";
      onlineIndicator.style.top = "0";
      onlineIndicator.style.right = "0";
      onlineIndicator.style.width = "10px";
      onlineIndicator.style.height = "10px";
      onlineIndicator.style.backgroundColor = "green"; // Change to black
      onlineIndicator.style.borderRadius = "50%";
      logoContainer.appendChild(onlineIndicator);

      // Create the message and set its style
      var message = document.createElement("p");
      message.appendChild(logoContainer);

      // Set background color and text color using style attribute
      message.style.backgroundColor = "black"; // Set background color to black
      message.style.color = "white"; // Set text color to white

      // Add the text content
      message.innerHTML += " How can I assist you?";

      // Append the message to chatContent
      chatContent.innerHTML = message.outerHTML + chatContent.innerHTML;
    }, 5000); // 5000 milliseconds (5 seconds)
  }
}

function sendMessage(event) {
  if (event && event.key === "Enter") {
    var inputField = document.querySelector(".chat-input");
    var userMessage = inputField.value;

    displayMessage(
      "<div style='position: relative; display: inline-block;'>" +
        "<img src='./images/title/student.png' alt='Profile Icon' class='profile-icon' style='width: 33px;'>" +
        "<div style='position: absolute; top: 0; right: 0; width: 10px; height: 10px; background-color: green; border-radius: 50%;'></div>" +
        "</div>" +
        "<span style='color: ;'>" +
        " " +
        userMessage +
        "</span>"
    );

    if (!chatBotResponded) {
      chatBotResponded = true;
      displayChatBotResponse(
        "<span style='color: black;'> Admin is currently offline. Please wait for a response.</span>",
        4000
      );

      displayChatBotResponse(
        "<span style='color: #000000;'>  Make sure to use this system only during school hours and avoid holidays or semester break. </span>",
        9000
      );
    }

    // Clear the input field
    inputField.value = "";
  }
}

function displayChatBotResponse(response, delay) {
  setTimeout(function () {
    var chatBotResponse =
      "<div style='position: relative; display: inline-block;'>" +
      "<img src='./images/title/logo.jpg' alt='Admin Icon' class='profile-icon' style='width: 33px;'>" +
      "<div style='position: absolute; top: 0; right: 0; width: 10px; height: 10px; background-color: green; border-radius: 50%;'></div>" +
      "</div>" +
      response;

    displayMessage(chatBotResponse);

    // Save messages to localStorage after the bot responds
    var chatContent = document.getElementById("chatContent").innerHTML;
    localStorage.setItem("chatMessages", chatContent);
  }, delay);
}

function displayMessage(message) {
  var chatContent = document.getElementById("chatContent");
  var newMessage = document.createElement("p");
  newMessage.innerHTML = message;
  chatContent.appendChild(newMessage);
}

// Add an event listener to clear chat messages on page load (browser reload)
document.addEventListener("DOMContentLoaded", function () {
  localStorage.removeItem("chatMessages");
});
