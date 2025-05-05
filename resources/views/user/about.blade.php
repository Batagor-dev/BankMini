@extends('user.layout')

@section('content')
<!-- Tambahkan Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="overflow-hidden h-screen relative bg-gray-100 flex flex-col">
    <!-- Carousel Container -->
    <div class="flex-1 flex w-full transition-transform duration-500 ease-in-out" id="carousel" style="width: calc(100vw * 7);">
        <!-- Slide 1: Header -->
        <div class="w-screen h-full flex-shrink-0 flex flex-col justify-center items-center p-6 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="text-center max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Tentang Kami</h1>
                <p class="text-lg text-gray-600 mb-8">Pelajari lebih lanjut tentang SMK BPPI, Bank Mini, dan tim pengembang di balik website ini.</p>
                <div class="flex justify-center space-x-4">
                    <button onclick="scrollToSlide(1)" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                        Mulai Jelajah <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                    <button onclick="history.back()" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </button>
                </div>
            </div>
        </div>

        <!-- Slide 2: SMK BPPI -->
        <div class="w-screen h-full flex-shrink-0 flex flex-col justify-center p-6 bg-gradient-to-br from-blue-50 to-blue-100">
            <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <img src="{{ asset('images/bppi.png') }}" class="w-32 h-32 object-contain">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tentang SMK BPPI Baleendah</h2>
                        <p class="text-gray-600 text-justify">
                            SMK BPPI Baleendah adalah sekolah kejuruan yang berfokus pada pengembangan keterampilan siswa di bidang teknologi, bisnis, dan industri. Dengan fasilitas modern dan tenaga pengajar profesional, SMK BPPI berkomitmen untuk mencetak lulusan yang siap bersaing di dunia kerja.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: Bank Mini -->
        <div class="w-screen h-full flex-shrink-0 flex flex-col justify-center p-6 bg-gradient-to-br from-green-50 to-green-100">
            <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <img src="{{ asset('images/bank.png') }}" alt="Logo Bank Mini" class="w-32 h-32 object-contain">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tentang Bank Mini</h2>
                        <p class="text-gray-600 text-justify">
                            Bank Mini adalah platform simulasi perbankan yang dirancang untuk siswa SMK BPPI. Tujuannya adalah memberikan pengalaman praktis dalam mengelola keuangan, seperti menabung, mencatat transaksi, dan memahami konsep perbankan modern.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 4: Studio Pengembang -->
        <div class="w-screen h-full flex-shrink-0 flex flex-col justify-center p-6 bg-gradient-to-br from-purple-50 to-purple-100">
            <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <img src="{{ asset('images/pplg.png') }}" alt="Logo Studio Pengembang" class="w-32 h-32 object-contain">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tentang Studio Pengembang</h2>
                        <p class="text-gray-600 text-justify">
                            Website ini dikembangkan oleh tim pengembang dari Studio Kreatif BPPI. Kami berfokus pada pembuatan aplikasi berbasis web yang inovatif dan user-friendly untuk mendukung kebutuhan pendidikan dan bisnis.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 5: Unit Produksi -->
        <div class="w-screen h-full flex-shrink-0 flex flex-col justify-center p-6 bg-gradient-to-br from-yellow-50 to-yellow-100">
            <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <img src="{{ asset('images/unit.png') }}" alt="Logo Unit Produksi" class="w-32 h-32 object-contain">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tentang Unit Produksi</h2>
                        <p class="text-gray-600 text-justify">
                            Unit Produksi SMK BPPI adalah bagian dari sekolah yang menyediakan layanan dan produk untuk masyarakat. Tujuannya adalah memberikan pengalaman kerja nyata kepada siswa melalui kegiatan produksi dan layanan berbasis industri.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 6: Lokasi -->
        <div class="w-screen h-full flex-shrink-0 flex flex-col justify-center p-6 bg-gradient-to-br from-red-50 to-red-100">
            <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Lokasi Kami</h2>
                <p class="text-gray-600 text-center mb-6">
                    SMK BPPI Baleendah, Jl. Raya Laswi No.1, Baleendah, Kabupaten Bandung, Jawa Barat, Indonesia.
                </p>
                <div class="mt-4 rounded-lg overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31686.123456789!2d107.612345!3d-6.987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e1234567890!2sSMK%20BPPI%20Baleendah!5e0!3m2!1sen!2sid!4v1234567890" 
                        width="100%" 
                        height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Slide 7: Footer -->
        <div class="w-screen h-full flex-shrink-0 flex flex-col justify-center items-center bg-blue-600 text-white">
            <div class="text-center p-8 max-w-2xl">
                <h2 class="text-2xl font-bold mb-4">Terima Kasih</h2>
                <p class="mb-8">Terima kasih telah mengunjungi halaman tentang kami. Semoga informasi ini bermanfaat.</p>
                <p class="text-sm">
                    &copy; {{ date('Y') }} Bank Mini | SMK BPPI Baleendah. Dikembangkan oleh Studio Kreatif BPPI.
                </p>
                <button onclick="scrollToSlide(0)" class="mt-8 bg-white text-blue-600 px-6 py-2 rounded-lg hover:bg-gray-100 transition">
                    <i class="fas fa-redo mr-2"></i> Kembali ke Awal
                </button>
            </div>
        </div>
    </div>

    <!-- Navigation Dots -->
    <div class="flex justify-center pb-6 space-x-2 z-10">
        @for ($i = 0; $i < 7; $i++)
            <button onclick="scrollToSlide({{ $i }})" class="w-3 h-3 rounded-full bg-white border border-gray-400 focus:outline-none dot" data-slide="{{ $i }}"></button>
        @endfor
    </div>

    <!-- Navigation Arrows -->
    <button onclick="prevSlide()" class="hidden md:block fixed left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 text-gray-800 p-3 rounded-full shadow-lg hover:bg-opacity-100 transition z-10">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button onclick="nextSlide()" class="hidden md:block fixed right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 text-gray-800 p-3 rounded-full shadow-lg hover:bg-opacity-100 transition z-10">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>

<!-- Script Carousel -->
<script>
    let currentSlide = 0;
    const totalSlides = document.querySelectorAll('#carousel > div').length;
    const carousel = document.getElementById('carousel');
    const dots = document.querySelectorAll('.dot');

    function updateCarousel() {
        carousel.style.transform = `translateX(-${currentSlide * 100}vw)`;
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.add('bg-blue-500', 'border-blue-500');
                dot.classList.remove('bg-white', 'border-gray-400');
            } else {
                dot.classList.remove('bg-blue-500', 'border-blue-500');
                dot.classList.add('bg-white', 'border-gray-400');
            }
        });
    }

    function scrollToSlide(index) {
        currentSlide = index;
        updateCarousel();
    }

    function nextSlide() {
        if (currentSlide < totalSlides - 1) {
            currentSlide++;
            updateCarousel();
        }
    }

    function prevSlide() {
        if (currentSlide > 0) {
            currentSlide--;
            updateCarousel();
        }
    }

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') nextSlide();
        if (e.key === 'ArrowLeft') prevSlide();
    });

    // Swipe support
    let touchStartX = 0;
    let touchEndX = 0;

    carousel.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    }, {passive: true});

    carousel.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchEndX < touchStartX - 50) nextSlide();
        if (touchEndX > touchStartX + 50) prevSlide();
    }, {passive: true});

    updateCarousel();
</script>

<!-- Style -->
<style>
    html, body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        height: 100%;
    }
    .dot {
        transition: all 0.3s ease;
    }
    #carousel {
        display: flex;
        width: calc(100vw * 7);
    }
    #carousel > div {
        width: 100vw;
        flex-shrink: 0;
        height: calc(100vh - 60px);
    }
    iframe {
        min-height: 300px;
    }
    @media (max-width: 768px) {
        #carousel > div {
            padding-bottom: 40px;
        }
    }
</style>
@endsection
