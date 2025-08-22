<?php
session_start()
include "../koneksi.php";


if (!isset($_SESSION['id_user'])) {
    header("Location: ../account/login.php");
    exit;
}

$queryAnggota = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM users WHERE role ='anggota'");
$dataAnggota = mysqli_fetch_assoc($queryAnggota);
$totalAnggota = $dataAnggota['total'];

$queryPemateri = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pemateri");
$dataPemateri = mysqli_fetch_assoc($queryPemateri);
$totalPemateri = $dataPemateri['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Sidebar</title>
  <link rel="stylesheet" href="../src/output.css"/>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
  />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <a href="dashboard.php" class="block p-2 hover:bg-sky-500 bg-sky-500 rounded">
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
        <a href="statistik.php" class="block p-2 hover:bg-sky-500 rounded">
          <i class="fa-solid fa-chart-simple mr-2"></i>Statistik Kehadiran
        </a>
      </li>
      <li>
        <a href="register.php" class="block p-2 hover:bg-sky-500 hover:text-white rounded text-0xl text-gray-800">
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
    <main class="p-4 pt-16 md:ml-64">
      <!-- Responsive Stat Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6 mt-6 py-6 px-3 rounded-2xl bg-white shadow-md">
        <div class="bg-blue-50 p-6 rounded-xl shadow-md cursor-pointer transform hover:scale-105 duration-200">
          <a href="#anggota">
          <p class="text-3xl font-bold flex items-center justify-between">
            <?= $totalAnggota ?><i class="fa-solid fa-users"></i>
          </p>
          </a>
          <p class="text-gray-500">Anggota</p>
        </div>
        <div class="bg-blue-50 p-6 rounded-xl shadow-md cursor-pointer transform hover:scale-105 duration-200">
          <a href="#pemateri">
          <p class="text-3xl font-bold flex items-center justify-between">
            <?= $totalPemateri ?><i class="fa-solid fa-chalkboard-user"></i>
          </p>
        </a>
          <p class="text-gray-500">Pemateri</p>
        </div>
        <div class="bg-blue-50 p-6 rounded-xl shadow-md cursor-pointer transform hover:scale-105 duration-200">
          <a href="#Grafik">
          <p class="text-3xl font-bold flex items-center justify-between">
            Grafik<i class="fa-solid fa-chart-simple"></i>
          </p>
        </a>
          <p class="text-gray-500">Kehadiran</p>
        </div>
       
        <div class="bg-sky-500 p-6 rounded-xl shadow-md cursor-pointer transform hover:scale-105 duration-200 text-white">
          <p class="text-3xl font-bold">Lorem</p>
          <p>Lorem</p>
        </div>
      </div>
      <div >
      </div>

      
  
      </main>
      </div>

  <!-- Script -->
  <script src="admin.js">
  </script>
</body>
</html>
