@extends('user.layout')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-semibold mb-4">Tentang Kami</h1>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <p class="mb-4">
            Selamat datang di aplikasi <strong>Bank Mini</strong>. Aplikasi ini dirancang untuk mempermudah pengelolaan keuangan Anda. 
            Dengan fitur-fitur seperti manajemen saldo, riwayat transaksi, dan informasi akun, kami berkomitmen untuk memberikan pengalaman terbaik bagi pengguna.
        </p>
        <p class="mb-4">
            Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi tim kami melalui email atau layanan pelanggan.
        </p>
        <p class="text-sm text-gray-500">
            &copy; {{ date('Y') }} Bank Mini. Semua hak dilindungi.
        </p>
    </div>
</div>
@endsection