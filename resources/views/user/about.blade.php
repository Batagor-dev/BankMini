@extends('user.layout')

@section('content')
<div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
<div class="mb-6">
        <button onclick="history.back()" 
                class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </button>
    </div>
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Tentang Kami</h1>
        <p class="text-gray-600 mt-4">Pelajari lebih lanjut tentang SMK BPPI, Bank Mini, dan tim pengembang di balik website ini.</p>
    </div>

    <!-- Swiper Slider -->
    <div class="swiper-container mb-12">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <img src="/images/smk-bppi-banner.jpg" alt="SMK BPPI Banner" class="w-full h-64 object-cover rounded-lg shadow-lg">
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
                <img src="/images/bank-mini-banner.jpg" alt="Bank Mini Banner" class="w-full h-64 object-cover rounded-lg shadow-lg">
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
                <img src="/images/studio-banner.jpg" alt="Studio Banner" class="w-full h-64 object-cover rounded-lg shadow-lg">
            </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Navigation Buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Bagian Deskripsi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Tentang SMK BPPI -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
            <img src="/images/smk-bppi-logo.png" alt="Logo SMK BPPI" class="w-16 h-16 mb-4 mx-auto">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Tentang SMK BPPI Baleendah</h2>
            <p class="text-gray-600 text-justify">
                SMK BPPI Baleendah adalah sekolah kejuruan yang berfokus pada pengembangan keterampilan siswa di bidang teknologi, bisnis, dan industri. Dengan fasilitas modern dan tenaga pengajar profesional, SMK BPPI berkomitmen untuk mencetak lulusan yang siap bersaing di dunia kerja.
            </p>
        </div>

        <!-- Tentang Bank Mini -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
            <img src="/images/bank-mini-logo.png" alt="Logo Bank Mini" class="w-16 h-16 mb-4 mx-auto">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Tentang Bank Mini</h2>
            <p class="text-gray-600 text-justify">
                Bank Mini adalah platform simulasi perbankan yang dirancang untuk siswa SMK BPPI. Tujuannya adalah memberikan pengalaman praktis dalam mengelola keuangan, seperti menabung, mencatat transaksi, dan memahami konsep perbankan modern.
            </p>
        </div>

        <!-- Tentang Studio Pengembang -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
            <img src="/images/studio-logo.png" alt="Logo Studio Pengembang" class="w-16 h-16 mb-4 mx-auto">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Tentang Studio Pengembang</h2>
            <p class="text-gray-600 text-justify">
                Website ini dikembangkan oleh tim pengembang dari Studio Kreatif BPPI. Kami berfokus pada pembuatan aplikasi berbasis web yang inovatif dan user-friendly untuk mendukung kebutuhan pendidikan dan bisnis.
            </p>
        </div>

        <!-- Tentang Unit Produksi -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
            <img src="/images/unit-produksi-logo.png" alt="Logo Unit Produksi" class="w-16 h-16 mb-4 mx-auto">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Tentang Unit Produksi</h2>
            <p class="text-gray-600 text-justify">
                Unit Produksi SMK BPPI adalah bagian dari sekolah yang menyediakan layanan dan produk untuk masyarakat. Tujuannya adalah memberikan pengalaman kerja nyata kepada siswa melalui kegiatan produksi dan layanan berbasis industri.
            </p>
        </div>
    </div>

    <!-- Lokasi -->
    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 mb-12">
        <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Lokasi Kami</h2>
        <p class="text-gray-600 text-justify">
            SMK BPPI Baleendah, Jl. Raya Laswi No.1, Baleendah, Kabupaten Bandung, Jawa Barat, Indonesia.
        </p>
        <div class="mt-4">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31686.123456789!2d107.612345!3d-6.987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e1234567890!2sSMK%20BPPI%20Baleendah!5e0!3m2!1sen!2sid!4v1234567890" 
                width="100%" 
                height="200" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-blue-600 text-white rounded-lg shadow-lg p-6 text-center">
        <p class="text-sm">
            &copy; {{ date('Y') }} Bank Mini | SMK BPPI Baleendah. Dikembangkan oleh Studio Kreatif BPPI.
        </p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>
@endsection