<?php
include "../koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: ../account/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Statistik Kehadiran</title>
  <link rel="stylesheet" href="../src/output.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
  />
</head>
<body class="flex min-h-screen bg-blue-100">

  <!-- Sidebar -->
  <div
    id="sidebar"
    class="fixed top-0 left-0 w-64 h-screen bg-sky-700 text-white p-4 
           overflow-y-auto z-50 transform -translate-x-full 
           md:translate-x-0 transition-transform duration-300 ease-in-out"
  >
  <div class="mt-1 flex border-b gap-3 items-center py-2">
    
    <div class="w-10 h-10 rounded-full">
    <img src="https://i.pinimg.com/736x/43/0f/07/430f07ae232540762bb76d3da5e7e5e6.jpg" class="object-cover rounded-full"></img>
    </div>
    
    <h2 class="text-xl font-bold">Absen Track</h2>
    
  </div>
   
  <div class="mt-6">
    <ul class="space-y-2">
      <li>
        <a href="dashboard.php" class="block p-2 hover:bg-sky-500 rounded">
          <i class="fa-solid fa-house-user mr-2"></i>Dashboard
        </a>
      </li>
      <li>
        <a href="absensi.php" class="block p-2 hover:bg-sky-500 rounded">
          <i class="fa-solid fa-file mr-2"></i>Manajemen Absensi
        </a>
      </li>
      <li>
        <a href="jadwal.php" class="block p-2 hover:bg-sky-500 rounded">
          <i class="fa-solid fa-calendar-check mr-2"></i>Manajemen Jadwal
        </a>
      </li>
      <li>
        <a href="#" class="block p-2 hover:bg-sky-500 bg-sky-500 rounded">
          <i class="fa-solid fa-chart-simple mr-2"></i>Statistik Kehadiran
        </a>
      </li>
      <li>
        <a href="register.php" class="block p-2 hover:bg-sky-500 hover:text-white rounded text-0xl text-gray-400">
          <i class="fa-solid fa-user-plus mr-2"></i>Registrasi
        </a>
      </li>
    </ul>
    </div>
  </div>

  <div class="flex-1 flex flex-col min-h-screen">
    <!-- Top Bar -->
    <div class="md:hidden bg-sky-800 text-white p-4 flex items-center justify-between fixed w-full z-40">
      <h1 class="text-lg font-bold">Absen Track</h1>
      <button id="toggleSidebar" class="text-white focus:outline-none text-2xl">
        ☰
      </button>
    </div>
    <!-- Main Area -->
    <main class="p-4 pt-10 md:ml-70">
      
      <!-- Judul dan Filter -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
        <h1 class="text-2xl md:text-3xl font-medium text-sky-600 text-center md:text-left">Statistik Kehadiran Anggota</h1>
        <select id="filterOption" class="p-2 border rounded bg-sky-500 text-white cursor-pointer">
          <option value="weekly">Statistik Mingguan</option>
          <option value="monthly">Statistik Bulanan</option>
        </select>
      </div>

      <!-- Konten Statistik -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <!-- Tabel Kehadiran -->
        <div class="bg-white shadow rounded-lg p-4 overflow-x-auto">
          <h2 class="text-xl font-bold mb-4 text-sky-600">Daftar Kehadiran Anggota</h2>
          <table class="w-full border-collapse min-w-[500px]">
            <thead>
              <tr class="bg-sky-500 text-white">
                <th class="p-2 border">No. Reg</th>
                <th class="p-2 border">Nama Anggota</th>
                <th class="p-2 border">Pelajaran Konsentrasi</th>
              </tr>
            </thead>
            <tbody id="attendanceTable"></tbody>
          </table>
        </div>

        <!-- Grafik Kehadiran -->
        <div class="bg-white shadow rounded-lg p-4">
          <h2 class="text-xl font-bold mb-4 text-sky-600">Grafik Kehadiran</h2>
          <canvas id="attendanceChart"></canvas>
        </div>
      </div>
    </main>
  </div>

    <script src="admin.js"></script>
</body>
</html>
