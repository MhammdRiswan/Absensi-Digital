<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Card Absensi</title>
</head>
<body class="min-h-screen bg-gray-100">
  <div class="flex justify-center p-6">
    <div class="max-w-md w-full bg-white shadow-lg rounded-2xl p-6">
      <h2 class="text-xl font-bold text-gray-700 mb-4">Form Absensi</h2>
      <!-- Form dikirim ke file PHP -->
      <form class="space-y-4" action="simpan_absensi.php" method="POST" enctype="multipart/form-data">
        <!-- Nama -->
        <div>
          <label class="block text-sm font-medium text-gray-600">Nama</label>
          <input type="text" name="nama" placeholder="Masukkan nama" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
        </div>

        <!-- No Registrasi -->
        <div>
          <label class="block text-sm font-medium text-gray-600">No. Registrasi</label>
          <input type="text" name="no_reg" placeholder="Masukkan no. registrasi" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
        </div>

        <!-- Konsentrasi -->
        <div>
          <label class="block text-sm font-medium text-gray-600">Konsentrasi</label>
          <input type="text" name="konsentrasi" placeholder="Masukkan konsentrasi" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
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

        <!-- Upload File (muncul jika izin/sakit) -->
        <div id="uploadDiv" class="hidden">
          <label class="block text-sm font-medium text-gray-600">Upload Surat (PDF/JPG/PNG)</label>
          <input type="file" name="surat" class="w-full mt-1 p-2 border rounded-lg">
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">Submit</button>
      </form>
    </div>
  </div>

  <!-- Dashboard Admin -->
  <div class="p-6">
    <h2 class="text-2xl font-bold text-gray-700 mb-4">Daftar Absensi (Admin)</h2>
    <table class="min-w-full bg-white border border-gray-200 shadow rounded-lg">
      <thead>
        <tr class="bg-gray-100 text-gray-700">
          <th class="py-2 px-4 border">Nama</th>
          <th class="py-2 px-4 border">No. Registrasi</th>
          <th class="py-2 px-4 border">Konsentrasi</th>
          <th class="py-2 px-4 border">Kehadiran</th>
          <th class="py-2 px-4 border">Surat</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Koneksi ke database
        $conn = new mysqli("localhost", "root", "", "AbsensiDigital");
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT * FROM absensi ORDER BY id DESC");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='text-center'>";
                echo "<td class='py-2 px-4 border'>" . htmlspecialchars($row['id_user']) . "</td>";
                echo "<td class='py-2 px-4 border'>" . htmlspecialchars($row['hari']) . "</td>";
                echo "<td class='py-2 px-4 border'>" . htmlspecialchars($row['status']) . "</td>";
                if ($row['surat']) {
                    echo "<td class='py-2 px-4 border'><a href='uploads/" . htmlspecialchars($row['surat']) . "' target='_blank' class='text-blue-500 underline'>Lihat</a></td>";
                } else {
                    echo "<td class='py-2 px-4 border'>-</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='py-2 px-4 text-center text-gray-500'>Belum ada data absensi</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <script>
    const selectKehadiran = document.getElementById("kehadiran");
    const uploadDiv = document.getElementById("uploadDiv");

    selectKehadiran.addEventListener("change", function() {
      if (this.value === "izin" || this.value === "sakit") {
        uploadDiv.classList.remove("hidden");
      } else {
        uploadDiv.classList.add("hidden");
      }
    });
  </script>
</body>
</html>

<!-- simpan_absensi.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['id_user'];
    $nama = $_POST['hari'];
   
    $kehadiran = $_POST['status'];

    // Upload file jika ada
    $file_name = null;
    if (isset($_FILES['surat']) && $_FILES['surat']['error'] == 0) {
        $file_name = basename($_FILES['surat']['name']);
        $target = "uploads/" . $file_name;
        move_uploaded_file($_FILES['surat']['tmp_name'], $target);
    }

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "AbsensiDigital");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO absensi (id_user, status, kehadiran, surat) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama, $no_reg, $konsentrasi, $kehadiran, $file_name);

    if ($stmt->execute()) {
        echo "Data absensi berhasil disimpan! <a href='index.php'>Kembali</a>";
    } else {
        echo "Gagal menyimpan data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
