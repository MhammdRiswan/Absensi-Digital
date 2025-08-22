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
  <link rel="stylesheet" href="../src/output.css"/>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
  />
</head>
<body class="flex min-h-screen bg-gray-100">

  <!-- Sidebar -->
  <div
    id="sidebar"
    class="fixed md:static top-0 left-0  h-screen w-64 bg-sky-600 text-white p-4 transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50"
  >
  <div class="mt-1 flex gap-3">
    <div class="w-10 h-10 ">
    <img src="../img/image.png" class="object-cover"></img>
    </div>
    <h2 class="text-xl font-bold items-center pt-1">Absen Track</h2>
  </div>
   
  <div class="mt-3">
    <ul class="space-y-2">
      <li>
        <a href="dashboard.php" class="block p-2 hover:bg-sky-500 rounded">
          <i class="fa-solid fa-house-user mr-2"></i>Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="block p-2 hover:bg-sky-500 bg-sky-500 rounded">
          <i class="fa-solid fa-book mr-2"></i>Informasi
        </a>
      </li>
      <li>
        <a href="absen.php" class="block p-2 hover:bg-sky-500 rounded">
          <i class="fa-solid fa-file mr-2"></i>Absensi
        </a>
      </li>
      <li>
        <a href="jadwal.php" class="block p-2 hover:bg-sky-500 rounded">
          <i class="fa-solid fa-calendar-check mr-2"></i>Jadwal
        </a>
      </li>
    </ul>
    </div>
  </div>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <!-- Top Bar -->
    <div class="md:hidden bg-sky-800 text-white p-4 flex items-center justify-between fixed w-full z-40">
      <h1 class="text-lg font-bold">Absen Track</h1>
      <button id="toggleSidebar" class="text-white focus:outline-none text-2xl">
        ☰
      </button> 
    </div>

    <!-- Main Area -->
    <main class="p-4 pt-16 md:pt-4">
     <body class= "bg-gray-100">
      <div class="mt-3">
        <h1 class="text-4xl flex justify-center text-sky-500 font-bold font-serif">Informasi</h1>
      </div> 

      <div class="mt-10">
     <table class="table-fixed w-full rounded-2xl border-collapse">
  <thead class="bg-sky-500 text-white">
    <tr class="divide-x">
      <th class=" px-2 py-1">No.Registrasi</th>
      <th class=" px-2 py-1">username</th>
      <th class=" px-2 py-1">Konsentrasi</th>
    </tr>
  </thead>
  <tbody class="bg-sky-200 ">

    <?php 
$reault = mysqli_query($koneksi, "SELECT * FROM users");
  while($data = mysqli_fetch_array($reault)){

    ?>
    <tr class="divide-x">
      <td class="border-white px-2 py-1 text-center align-middle"><?=$data['no_reg']?></td>
      <td class="border-white px-2 py-1 text-center align-middle"><?=$data['username']?></td>
      <td class="border-white px-2 py-1 text-center align-middle"><?=$data['pelajaran_konsentrasi']?></td>
    </tr>

    <?php } ?>
    
    
  </tbody>
</table>


       
        </div>
      </main>

  <!-- Script -->
  <script src="user.js"></script>
</body>
</html>
