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
  <body>
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
                ><i class="fa-solid fa-envelope mr-1"></i>Email</label
              >
              <input
                type="email"
                placeholder="you@example.com"
                required
                class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                ><i class="fa-solid fa-user mr-1"></i>Username</label
              >
              <input
                type="text"
                placeholder="masukkan username anda"
                class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                ><i class="fa-solid fa-lock mr-1"></i>Password</label
              >
              <input
                type="password"
                placeholder="••••••••"
                required
                class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                ><i class="fa-solid fa-lock mr-1"></i>Konfirmasi password
                anda</label
              >
              <input
                type="password"
                placeholder="••••••••"
                required
                class="w-full px-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"
              />
            </div>

            <button
              type="submit"
              class="w-full bg-blue-500 hover:bg-blue-600 cursor-pointer text-white py-2 rounded-xl transition duration-200 font-semibold"
            >
              <a href="./login.php">Sign Up</a>
            </button>
          </form>

          <p class="mt-6 text-sm text-center text-gray-600">
            Don't have an account?
            <a href="signup.html" class="text-blue-600 hover:underline"
              >Sign up</a
            >
          </p>
        </div>
      </body>
    </html>
  </body>
</html>
