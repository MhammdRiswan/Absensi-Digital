<?php
include "../koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../src/output.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
    />
  </head>
  <body class="bg-blue-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-sm">
      <h2 class="text-2xl font-bold text-center text-blue-500 mb-6">
        Welcome To Absen Track
      </h2>

      <form class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1"
            ><i class="fa-solid fa-user mr-1"></i>Username</label
          >
          <input
            id="username"
            type="text"
            placeholder="Masukkan username anda"
            required
            class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1"
            ><i class="fa-solid fa-lock mr-1"></i>Password</label
          >
          <input
            id="pas"
            type="password"
            placeholder="••••••••"
            required
            class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
          />
        </div>

        <div>
          <label
            class="block text-sm font-medium text-gray-700 mb-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >Level</label
          >
          <div class="rounded px-4 border border-gray-300">
            <select id="role" class="pr-50 py-2 border-none cursor-pointer">
              <option>Admin</option>
              <option>Anggota</option>
            </select>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center text-sm text-gray-600">
            <input
              type="checkbox"
              class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-400"
            />
            Remember me
          </label>
          <a href="#" class="text-sm text-blue-600 hover:underline">Forgot?</a>
        </div>

        <button
          type="submit"
          class="w-full bg-blue-500 hover:bg-blue-600 cursor-pointer text-white py-2 rounded-xl transition duration-200 font-semibold"
        >
          <a href="#">Sign In</a>
        </button>
      </form>

      <p class="mt-6 text-sm text-center text-gray-600">
        Don't have an account?
        <a href="./register.php" class="text-blue-600 hover:underline">Sign up</a>
      </p>
    </div>

    <script>
      document
        .getElementById("loginForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          const username = document.getElementById("username").value.trim();
          const password = document.getElementById("password").value.trim();
          const role = document.getElementById("role").value;

          // Contoh validasi login sederhana
          if (role === "admin") {
            // Login admin (username dan password bisa diatur sesuai keinginan)
            if (username === "admin" && password === "admin123") {
              window.location.href = "admin/dashboard.php";
            } else {
              alert("Username atau password admin salah!");
            }
          } else if (role === "user") {
            // Login user
            if (username === "user" && password === "user123") {
              window.location.href = "dashboard_user.html";
            } else {
              alert("Username atau password user salah!");
            }
          } else {
            alert("Pilih role terlebih dahulu!");
          }
        });
    </script>
  </body>
</html>
