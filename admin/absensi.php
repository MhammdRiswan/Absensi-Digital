<?php
session_start();
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
    <title>Responsive Sidebar</title>
    <link rel="stylesheet" href="../src/output.css" />
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
           overflow-y-auto z-50 border-r border-gray-900 transform -translate-x-full 
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
        <a href="#" class="block p-2 hover:bg-sky-500 bg-sky-500 rounded">
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

      <!-- Main Content -->
      <main class="p-4 md:ml-70">
        <h1 class="text-2xl font-bold mb-4">Welcome</h1>
        <p>This is the main content area.</p>
   <?php 
  $reault = mysqli_query($koneksi, "SELECT * FROM users WHERE role ='anggota'");
  while($data = mysqli_fetch_array($reault)){
?>
  <div class="rounded-lg shadow-md bg-white w-150 py-5 px-10 mb-6">
    <h2 class="flex justify-center text-2xl font-bold text-sky-500">Absensi kehadiran</h2>
    <form class="space-y-4" action="simpan_absensi.php" method="POST" enctype="multipart/form-data">
      <!-- Nama -->
      <div>
        <label class="block text-sm font-medium text-gray-600">Nama</label>
        <input type="text" name="nama" value="<?=$data['username']?>" readonly
          class="w-full mt-1 p-2 border rounded-lg bg-gray-100 focus:ring focus:ring-sky-300">
      </div>

      <!-- No Registrasi -->
      <div>
        <label class="block text-sm font-medium text-gray-600">No. Registrasi</label>
        <input type="text" name="no_reg" value="<?=$data['no_reg']?>" readonly
          class="w-full mt-1 p-2 border rounded-lg bg-gray-100 focus:ring focus:ring-blue-300">
      </div>

      <!-- Konsentrasi -->
      <div>
        <label class="block text-sm font-medium text-gray-600">Konsentrasi</label>
        <input type="text" name="konsentrasi" value="<?=$data['pelajaran_konsentrasi']?>" readonly
          class="w-full mt-1 p-2 border rounded-lg bg-gray-100 focus:ring focus:ring-blue-300">
      </div>

      <!-- Kehadiran -->
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">Kehadiran</label>
        <select id="kehadiran" name="kehadiran" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
          <option value="hadir">Hadir</option>
          <option value="izin">Izin</option>
          <option value="sakit">Sakit</option>
        </select>
      </div>

      <!-- Upload File -->
      <div id="uploadDiv" class="hidden">
        <label class="block text-sm font-medium text-gray-600">Upload Surat (PDF/JPG/PNG)</label>
        <input type="file" name="surat" class="w-full mt-1 p-2 border rounded-lg">
      </div>

      <!-- Tombol Submit -->
      <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
        Submit
      </button>
    </form>
  </div>
<?php } ?>


  </div>
  </div>
      </main>
    </div>

    <!-- Script -->
    <script src="admin.js"></script>
  </body>
</html>
