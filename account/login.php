<?php
session_start();
require '../koneksi.php';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password']; // jangan di-md5, biarkan asli

    // Cari user berdasarkan username
    $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    $cari = mysqli_num_rows($sql);

    if ($cari > 0) {
        $akses = mysqli_fetch_array($sql);

        // Verifikasi password hash
        if (password_verify($password, $akses['password'])) {

            // Simpan session
            $_SESSION['id_user'] = $akses['id_user'];
            $_SESSION['username'] = $akses['username'];
            $_SESSION['role'] = $akses['role'];

            // Redirect sesuai role
            if ($akses['role'] === "admin") {
                header('Location: ../admin/dashboard.php');
                exit;
            } elseif ($akses['role'] === "anggota") {
                header('Location: ../user/dashboard.php');
                exit;
            } else {
                echo "<script>alert('Role tidak dikenali!'); window.location='login.php';</script>";
            }

        } else {
            echo "<script>alert('Password salah!'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location='login.php';</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="../src/output.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" />
</head>

<body class="bg-blue-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-sm">
    <h2 class="text-2xl font-bold text-center text-blue-500 mb-6">
      Welcome To Absen Track
    </h2>

    <form id="loginForm" class="space-y-5" method="POST">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          <i class="fa-solid fa-user mr-1"></i>Username
        </label>
        <input id="username" name="username" type="text" placeholder="Masukkan username anda" required
          class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          <i class="fa-solid fa-lock mr-1"></i>Password
        </label>
        <input id="password" name="password" type="password" placeholder="••••••••" required
          class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Level</label>
        <div class="rounded px-4 border border-gray-300">
          <select id="role" name="role" class="pr-50 py-2 border-none cursor-pointer">
            <option value="admin">Admin</option>
            <option value="anggota">Anggota</option>
          </select>
        </div>
      </div>

      <div class="flex items-center justify-between">
        <label class="flex items-center text-sm text-gray-600">
          <input type="checkbox" class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-400" />
          Remember me
        </label>
        <a href="#" class="text-sm text-blue-600 hover:underline">Forgot?</a>
      </div>

      <button type="submit" name="login" class="w-full bg-blue-500 hover:bg-blue-600 cursor-pointer text-white py-2 rounded-xl transition duration-200 font-semibold">
        
        Sign in
      
      </button>
    </form>

  
</body>

</html>