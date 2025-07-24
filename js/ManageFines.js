function toggleDropdown() {
      document.getElementById("dropdownMenu").classList.toggle("show");
}
    // Close the dropdown if user clicks outside of it
      window.onclick = function(event) {
      if (!event.target.matches('.dropdown-toggle') && !event.target.closest('.dropdown-toggle')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (let i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove("show");
      }
      }
}

function UpdateTable(){
      document.getElementById('update').style.display = "block";
      document.getElementById('pen').style.display = "block";
      document.getElementById('pen2').style.display = "block";
      document.getElementById('pen3').style.display = "block";
      document.getElementById('pen1').style.display = "block";
}



window.onload = function () {
const leaderName = localStorage.getItem("leaderName");
    const district = localStorage.getItem("district");
    const sector = localStorage.getItem("sector");

    if (leaderName) {
      document.getElementById("displayName").textContent = leaderName;
      document.getElementById("loginFormSection").style.display = "none";
      document.getElementById("dashboard").style.display = "block";
      document.getElementById("showDistrict").textContent = district || "";
      document.getElementById("showSector").textContent = sector || "";
    }
  };

  // Handle form submission
  document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("username").value;
    const district = document.getElementById("district").value;
    const sector = document.getElementById("sector").value;

    localStorage.setItem("leaderName", name);
    localStorage.setItem("district", district);
    localStorage.setItem("sector", sector);

    location.reload(); // reload to show dashboard
  });

const data = [
      { keyword: "KAGANDA", description: "Entrepreneurial or other trading issue", link: "#trading" },
      { keyword: "MUSASA", description: "Public clinic issues and other health problem", link: "#health" },
      { keyword: "BUGAMBA", description: "School concerns and Higher education issue", link: "#education" },
      { keyword: "RUTOVU", description: "Leadership concerns and political issues", link: "#leadership" }
];

function handleSearch(event) {
      event.preventDefault();
      const query = document.getElementById("searchInput").value.trim().toLowerCase();
      const resultsDiv = document.getElementById("searchResults");
      const descBox = document.getElementById("descriptionBox");
      descBox.style.display = "none";

      const matches = data.filter(item => item.keyword.includes(query));

      if (matches.length === 0) {
      resultsDiv.innerHTML = "<p>No results found.</p>";
      } else {
      resultsDiv.innerHTML = matches.map(item =>
      `<div class="result" onclick="handleClick('${item.keyword}')">
            <strong>${item.keyword}</strong>: ${item.description}
      </div>`
      ).join("");
      }
}

function handleClick(keyword) {
      const item = data.find(d => d.keyword === keyword);
      const descBox = document.getElementById("descriptionBox");
      descBox.innerHTML = `<strong>${item.keyword.toUpperCase()}</strong><br>${item.keyword.toLowerCase()} is one of necessary public service that help citizens to be developed in all corners. <br>Dear citizen if you were or you have an issue you can, report or view you complaint. `
      descBox.style.display = "block";
}

const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
new Chart(monthlyCtx, {
  type: 'bar',
  data: {
    labels: ['Bugamba', 'Kaganda', 'Musasa', 'Rutovu',],
    datasets: [{
      label: 'Attendance (%)',
      data: [15, 4, 0, 6, ,],
      backgroundColor: '#07586eff'
    }]
  },
  options: {
    indexAxis: 'y',
    responsive: true,
    plugins: {
      legend: { display: false },
      title: { display: false }
    },
    scales: {
      x: {
        max: 100,
        title: { display: true, text: 'Percentage' }
      }
    }
  }
});

// Attendance by Population Group Chart
const populationCtx = document.getElementById('populationChart').getContext('2d');
new Chart(populationCtx, {
  type: 'bar',
  data: {
    labels: ['Youth', 'Adults', 'Elderly', 'Students'],
    datasets: [{
      label: 'Attendance (%)',
      data: [95, 20, 50, 40],
      backgroundColor: '#0a6b6eff'
    }]
  },
  options: {
    indexAxis: 'y',
    responsive: true,
    plugins: {
      legend: { display: false },
      title: { display: false }
    },
    scales: {
      x: {
        max: 100,
        title: { display: true, text: 'Percentage' }
      }
    }
  }
})