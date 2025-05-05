<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bank Mini - Selamat Datang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans">

  <!-- Navbar -->
  <header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center py-4 px-6">
      <h1 class="text-2xl font-bold text-indigo-700">Bank Mini</h1>
      <nav class="mt-2 md:mt-0 space-x-4 text-center md:text-left">
        <a href="#home" class="hover:text-indigo-600">Home</a>
        <a href="{{ route('login') }}" class="hover:text-indigo-600">Login</a>
        <a href="#about" class="hover:text-indigo-600">Tentang Kami</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="home" class="bg-indigo-50 py-20 px-6 text-center">
    <h2 class="text-4xl md:text-5xl font-bold text-indigo-800 mb-4">Solusi Keuangan Modern untuk Semua Orang</h2>
    <p class="text-lg text-indigo-700 max-w-xl mx-auto mb-6">Bank Mini adalah aplikasi keuangan yang memudahkan Anda untuk mengelola, menyimpan, dan memantau saldo Anda dengan cepat dan aman.</p>
    <div class="space-y-4 md:space-y-0 md:space-x-4 flex flex-col md:flex-row justify-center">
      <a href="#register" class="bg-indigo-600 text-white px-6 py-3 rounded shadow hover:bg-indigo-700">Daftar Sekarang</a>
      <a href="#login" class="border border-indigo-600 text-indigo-600 px-6 py-3 rounded hover:bg-indigo-100">Masuk</a>
    </div>
  </section>

  <!-- Tentang Bank Mini -->
  <section id="about" class="py-16 px-6 bg-white">
    <div class="container mx-auto max-w-5xl">
      <h3 class="text-3xl font-bold mb-4 text-center text-indigo-700">Apa Itu Bank Mini?</h3>
      <p class="text-gray-600 text-lg text-center mb-10">Bank Mini adalah platform keuangan digital yang dibangun oleh siswa SMK BPPI. Aplikasi ini bertujuan memberikan solusi pengelolaan keuangan yang aman, cepat, dan mudah digunakan oleh semua kalangan.</p>

      <h4 class="text-2xl font-semibold text-center text-indigo-700 mb-6">Proyek SMK BPPI</h4>
      <p class="text-gray-600 text-lg text-center mb-10">Bank Mini adalah hasil dari inovasi dan semangat kolaborasi siswa SMK BPPI, sebagai bentuk kontribusi dalam dunia teknologi finansial untuk pelajar dan masyarakat luas.</p>

      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-indigo-50 p-6 rounded shadow text-center">
          <h4 class="text-xl font-semibold text-indigo-700 mb-2">Mudah Digunakan</h4>
          <p class="text-gray-600">Antarmuka yang ramah pengguna cocok untuk pemula dan profesional.</p>
        </div>
        <div class="bg-indigo-50 p-6 rounded shadow text-center">
          <h4 class="text-xl font-semibold text-indigo-700 mb-2">Aman & Terpercaya</h4>
          <p class="text-gray-600">Sistem autentikasi yang menjaga keamanan data dan transaksi Anda.</p>
        </div>
        <div class="bg-indigo-50 p-6 rounded shadow text-center">
          <h4 class="text-xl font-semibold text-indigo-700 mb-2">Cepat & Efisien</h4>
          <p class="text-gray-600">Transaksi diproses secara instan dan tanpa hambatan.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Fitur Utama -->
  <section class="bg-indigo-50 py-16 px-6">
    <div class="container mx-auto max-w-5xl">
      <h3 class="text-3xl font-bold mb-10 text-center text-indigo-700">Fitur Utama Bank Mini</h3>
      <div class="grid md:grid-cols-2 gap-10">
        <div>
          <h4 class="text-xl font-semibold text-indigo-700">Dashboard Admin</h4>
          <p class="text-gray-700 mt-2">Pantau akun pengguna dan aktivitas keuangan secara terpusat.</p>
        </div>
        <div>
          <h4 class="text-xl font-semibold text-indigo-700">CRUD Pengguna</h4>
          <p class="text-gray-700 mt-2">Kelola data pengguna dengan sistem otomatisasi yang efisien.</p>
        </div>
        <div>
          <h4 class="text-xl font-semibold text-indigo-700">Mode Terang/Gelap</h4>
          <p class="text-gray-700 mt-2">Pilih mode tampilan sesuai preferensi visual Anda.</p>
        </div>
        <div>
          <h4 class="text-xl font-semibold text-indigo-700">Riwayat Transaksi</h4>
          <p class="text-gray-700 mt-2">Lihat semua aktivitas keuangan secara jelas dan transparan.</p>
        </div>
      </div>
    </div>
  </section>

  

  <!-- Call to Action -->
  <section class="py-16 px-6 text-center bg-indigo-100">
    <h3 class="text-3xl font-bold text-indigo-800 mb-4">Siap Mengelola Keuangan Anda Lebih Baik?</h3>
    <p class="text-gray-700 text-lg mb-6">Gabung bersama ratusan pengguna lainnya yang sudah merasakan manfaat Bank Mini.</p>
  
  </section>

  <!-- Footer -->
  <footer class="bg-indigo-50 text-center py-6 mt-10 text-sm text-gray-600">
    &copy; 2025 Bank Mini. Dibuat dengan ❤️ oleh siswa SMK BPPI.
  </footer>

</body>
</html>
