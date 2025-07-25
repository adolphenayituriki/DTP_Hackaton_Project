  function handleLogin(event) {
    event.preventDefault();

    // Example login check logic
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === "admin" && password === "1234") {
      window.location.href = "ManageFiles.html";
    } else {
      alert("Invalid credentials!");
    }

    return false;
  }

