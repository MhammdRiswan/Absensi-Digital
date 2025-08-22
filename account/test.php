<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      display: flex;
      background: #eaf3ff;
    }

    /* Sidebar */
    aside {
      width: 220px;
      background: #005b96;
      color: white;
      min-height: 100vh;
      padding: 20px;
    }

    aside h2 {
      margin-bottom: 20px;
    }

    aside ul {
      list-style: none;
      padding: 0;
    }

    aside ul li {
      margin: 15px 0;
    }

    aside ul li a {
      color: white;
      text-decoration: none;
    }

    /* Main */
    main {
      flex: 1;
      padding: 20px;
    }

    section {
      margin-bottom: 30px;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .cards {
      display: flex;
      gap: 20px;
    }

    .card {
      flex: 1;
      background: #f5faff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
    }

    canvas {
      width: 100% !important;
      max-height: 300px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <aside>
    <h2>Absen Track</h2>
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Manajemen Informasi</a></li>
      <li><a href="#">Manajemen Absensi</a></li>
      <li><a href="#">Manajemen Jadwal</a></li>
      <li><a href="#">Statistik Kehadiran</a></li>
      <li><a href="#">Registrasi</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main>
    <!-- Statistik Section -->
    <section id="statistik">
      <h2>Statistik</h2>
      <div class="cards">
        <div class="card">1 Anggota</div>
        <div class="card">2 Pemateri</div>
        <div class="card">100 Lorem</div>
      </div>
    </section>

    <!-- Grafik Section -->
    <section id="grafik">
      <h2>Grafik Kehadiran</h2>
      <canvas id="chart"></canvas>
    </section>

    <!-- Aktivitas Terbaru Section -->
    <section id="aktivitas">
      <h2>Aktivitas Terbaru</h2>
      <ul>
        <li>✔ Anggota baru: Riswan</li>
        <li>✔ Absensi ditambahkan: 21 Agustus 2025</li>
        <li>✔ Jadwal baru: Seminar Produktivitas</li>
      </ul>
    </section>
  </main>

  <!-- Chart.js Script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
        datasets: [{
          label: 'Kehadiran',
          data: [12, 19, 7, 15, 10],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        }
      }
    });
  </script>
</body>
</html>
