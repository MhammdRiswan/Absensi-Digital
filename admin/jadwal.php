<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: ../account/login.php");
    exit;
}

$sql = "select * from jadwal";


if(isset($_POST["kirim"])){
  $nama=$_POST["nama_kegiatan"];
  $waktu=$_POST["waktu"];
  $tempat=$_POST["tempat"];
  $pemateri=$_POST["pemateri"];


$kirim = mysqli_query($koneksi, "INSERT INTO jadwal (nama_kegiatan, waktu, tempat, pemateri) values ('$nama', '$waktu', '$tempat', '$pemateri')");

if($kirim){
  echo "<script>
        alert('data sukses disimpan!');
        document.location='jadwal.php';
      </script>";
} else {
  echo "<script>
        alert('data gagal disimpan!');
        document.location='jadwal.php';
      </script>";
}
}

if(isset($_POST["update"])){
  $id = $_POST["edit_id"];
  $nama = $_POST["edit_nama_kegiatan"];
  $waktu = $_POST["edit_waktu"];
  $tempat = $_POST["edit_tempat"];
  $pemateri = $_POST["edit_pemateri"];

  $update = mysqli_query($koneksi, "UPDATE jadwal SET 
              nama_kegiatan='$nama',
              waktu='$waktu',
              tempat='$tempat',
              pemateri='$pemateri'
              WHERE id_jadwal='$id'");

  if($update){
    echo "<script>alert('Data berhasil diupdate!');document.location='jadwal.php';</script>";
  } else {
    echo "<script>alert('Gagal update data!');</script>";
  }
}

if(isset($_GET["hapus"])){
  $id = $_GET["hapus"];
  $hapus = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$id'");
  if($hapus){
    echo "<script>alert('Data berhasil dihapus!');document.location='jadwal.php';</script>";
  } else {
    echo "<script>alert('Gagal menghapus data!');</script>";
  }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal='$id'");
    $editData = mysqli_fetch_assoc($query);
    echo "<script>
        window.onload = function() {
            openEditModal('".$editData['id_jadwal']."',
                          '".$editData['nama_kegiatan']."',
                          '".$editData['waktu']."',
                          '".$editData['tempat']."',
                          '".$editData['pemateri']."');
        }
    </script>";
}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Kegiatan</title>
    <link rel="stylesheet" href="../src/output.css"/>
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
        <a href="absensi.php" class="block p-2 hover:bg-sky-500 rounded">
          <i class="fa-solid fa-file mr-2"></i>Manajemen Absensi
        </a>
      </li>
      <li>
        <a href="#" class="block p-2 hover:bg-sky-500 bg-sky-500 rounded">
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
        <h1 class="text-2xl font-bold mb-4 text-sky-600">
          Jadwal Kegiatan Mingguan
        </h1>

        <!-- Form Admin -->
        <div class="bg-white p-4 rounded-lg shadow-lg mb-4">
          <h2 class="font-semibold mb-2">Tambah Jadwal</h2>
          <div class="">
            <form method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <input
              name="nama_kegiatan"
              id="nama"
              type="text"
              placeholder="Nama Kegiatan"
              class="border-2 border-sky-400 p-2 rounded"
            />
            <input
              name="waktu"
              id="waktu"
              type="date"
              placeholder="Waktu"
              class="border-2 border-sky-400 p-2 rounded"
            />  
            <input
              name="tempat"
              id="tempat"
              type="text"
              placeholder="Tempat"
              class="border-2 border-sky-400 p-2 rounded"
            />
            <input
              name="pemateri"
              id="pemateri"
              type="text"
              placeholder="Pemateri"
              class="border-2 border-sky-400 p-2 rounded"
            />
          </div>
          <button
            name="kirim"
            id="saveBtn"
            type="submit""
            class="bg-sky-500 text-white px-4 py-2 rounded mt-2 cursor-pointer hover:bg-sky-700 font-medium"
          >
            Simpan
          </button>
          </form>
        </div>

        <!-- Tabel Jadwal -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
          <table class="min-w-full border border-sky-500">
            <!-- Modal Edit -->
<div id="editModal" class="hidden fixed inset-0 bg-blue-100 bg-white-50 flex justify-center items-center">
  <div class="bg-white p-6 rounded-lg shadow-lg w-96 ml-70">
    <h2 class="text-xl font-bold mb-4">Edit Jadwal</h2>
    <form method="POST">
      <input type="hidden" id="edit_id" name="edit_id">

      <input type="text" id="edit_nama" name="edit_nama_kegiatan" 
             class="border-2 border-sky-400 p-2 rounded w-full mb-2" placeholder="Nama Kegiatan" required>

      <input type="date" id="edit_waktu" name="edit_waktu" 
             class="border-2 border-sky-400 p-2 rounded w-full mb-2" required>

      <input type="text" id="edit_tempat" name="edit_tempat" 
             class="border-2 border-sky-400 p-2 rounded w-full mb-2" placeholder="Tempat" required>

      <input type="text" id="edit_pemateri" name="edit_pemateri" 
             class="border-2 border-sky-400 p-2 rounded w-full mb-2" placeholder="Pemateri" required>

      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeEditModal()" 
                class="bg-red-700 text-white px-4 py-2 rounded">Batal</button>
        <button type="submit" name="update" 
                class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-700">Update</button>
      </div>
    </form>
  </div>
</div>
<table class="border border-collapse w-full">
            <thead>
              <tr class="bg-sky-500 text-white">
                <th class="py-2 px-4 border border-sky-500 text-center align-middle">Nama Kegiatan</th>
                <th class="py-2 px-4 border border-sky-500 text-center align-middle">Waktu</th>
                <th class="py-2 px-4 border border-sky-500 text-center align-middle">Tempat</th>
                <th class="py-2 px-4 border border-sky-500 text-center align-middle">Pemateri</th>
                <th class="py-2 px-4 border border-sky-500 text-center align-middle">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php 
$reault = mysqli_query($koneksi, "SELECT * FROM jadwal");
  while($data = mysqli_fetch_array($reault)){

    ?>
    
    <tr class="divide-x ${index % 2 === 0 ? border-t border-black-200">
      <td class="border-white px-2 py-3 text-center align-middle font-semibold"><?=$data['nama_kegiatan']?></td>
      <td class="border-white px-2 py-3 text-center align-middle font-semibold"><?=$data['waktu']?></td>
      <td class="border-white px-2 py-3 text-center align-middle font-semibold"><?=$data['tempat']?></td>
      <td class="border-white px-2 py-3 text-center align-middle font-semibold"><?=$data['pemateri']?></td>
      <td class="text-center align-middle">
      <button onclick="window.location.href='jadwal.php?edit=<?=$data['id_jadwal']?>'"
        class="bg-yellow-400 px-2 py-1 rounded cursor-pointer">Edit</button>
      <a href="jadwal.php?hapus=<?=$data['id_jadwal']?>" 
          onclick="return confirm('Yakin mau hapus jadwal ini?')" 
          class="bg-red-500 text-white px-2 py-1 rounded">Hapus</a>
   </td>

    </tr>

    <?php } ?>

            </tbody>
          </table>
        </div>
        </div>
      </main>
    

    <script src="admin.js"></script>
  </body>
</html>
