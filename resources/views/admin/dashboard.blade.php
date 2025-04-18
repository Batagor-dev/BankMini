<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex text-gray-800 dark:text-gray-100">


  @extends('admin.layout')

@section('content')
     <!-- Main Content -->
  <main class="flex-1 p-6 overflow-y-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Dashboard Admin</h1>

    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
      <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
        <h3 class="text-gray-500 dark:text-gray-300">Total Saldo Harian</h3>
        <p class="text-2xl font-semibold text-blue-600">Rp 1.250.000</p>
      </div>
      <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
        <h3 class="text-gray-500 dark:text-gray-300">Total Saldo Keseluruhan</h3>
        <p class="text-2xl font-semibold text-green-600">Rp 50.000.000</p>
      </div>
      <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
        <h3 class="text-gray-500 dark:text-gray-300">Akun Aktif</h3>
        <p class="text-xl font-semibold text-purple-600">23 akun aktif</p>
      </div>
      <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
        <h3 class="text-gray-500 dark:text-gray-300">Teller Aktif</h3>
        <p class="text-xl font-semibold text-orange-600">3 teller</p>
      </div>
    </div>

    <!-- Riwayat Transaksi -->
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
      <h3 class="text-lg font-semibold mb-4">Riwayat Transaksi Terbaru</h3>
      <table class="min-w-full text-sm text-left">
        <thead class="bg-gray-100 dark:bg-gray-700">
          <tr>
            <th class="px-4 py-2">Waktu</th>
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Jenis</th>
            <th class="px-4 py-2">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-gray-200 dark:border-gray-600">
            <td class="px-4 py-2">18 Apr 2025, 10:12</td>
            <td class="px-4 py-2">Budi</td>
            <td class="px-4 py-2 text-green-600">Setor</td>
            <td class="px-4 py-2">Rp 500.000</td>
          </tr>
          <tr class="border-b border-gray-200 dark:border-gray-600">
            <td class="px-4 py-2">18 Apr 2025, 09:30</td>
            <td class="px-4 py-2">Sinta</td>
            <td class="px-4 py-2 text-red-600">Tarik</td>
            <td class="px-4 py-2">Rp 200.000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
@endsection


 

  
</body>
</html>
