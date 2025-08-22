const toggleBtn = document.getElementById("toggleSidebar");
const sidebar = document.getElementById("sidebar");

toggleBtn.addEventListener("click", () => {
  sidebar.classList.toggle("-translate-x-full");
});

function openEditModal(id, nama, waktu, tempat, pemateri) {
  document.getElementById("edit_id").value = id;
  document.getElementById("edit_nama").value = nama;
  document.getElementById("edit_waktu").value = waktu;
  document.getElementById("edit_tempat").value = tempat;
  document.getElementById("edit_pemateri").value = pemateri;
  document.getElementById("editModal").classList.remove("hidden");
}

function closeEditModal() {
  document.getElementById("editModal").classList.add("hidden");
}

const ctx = document.getElementById("chart").getContext("2d");
new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
    datasets: [
      {
        label: "Kehadiran",
        data: [12, 19, 7, 15, 10, 12],
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false },
    },
  },
});

const cty = document.getElementById("chart2").getContext("2d");
new Chart(cty, {
  type: "pie",
  data: {
    labels: ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4", "Minggu 5"],
    datasets: [
      {
        label: "Kehadiran",
        data: [12, 19, 7, 15, 10],
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false },
    },
  },
});
