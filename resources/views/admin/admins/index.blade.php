@extends('admin.layout')

@section('content')
<div class="p-6 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-blue-600 mb-6">Manajemen Admin</h2>

    <!-- Notifikasi Sukses -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg shadow mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Reset Password -->
    <div class="mb-6 flex flex-wrap gap-4">
        <button onclick="openModal('admin')" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Reset Password Admin
        </button>
        <button onclick="openModal('user')" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
            Reset Password User
        </button>
        <button onclick="openModal('teller')" class="px-4 py-2 bg-yellow-600 text-white rounded-lg shadow hover:bg-yellow-700 transition">
            Reset Password Teller
        </button>
    </div>

    <!-- Tabel Admin -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-blue-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-3 font-semibold">Username</th>
                    <th class="px-4 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr class="bg-white dark:bg-gray-800 hover:bg-blue-50 dark:hover:bg-gray-700 transition">
                    <td class="px-4 py-3">{{ $admin->username }}</td>
                    <td class="px-4 py-3 space-x-2">
                        <a href="{{ route('admin.admins.edit', $admin->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $admins->links('pagination::tailwind') }}
    </div>
</div>

<!-- Modal Box -->
<div id="resetPasswordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div onclick="closeModal()" class="absolute inset-0"></div> <!-- Area klik di luar modal -->
    <div class="relative bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md z-10">
        <h2 id="modalTitle" class="text-lg font-semibold mb-4 dark:text-white">Reset Password</h2>
        <form id="resetPasswordForm" action="" method="POST">
            @csrf
            <input type="hidden" id="role" name="role">
            <div class="mb-4">
                <label for="username" class="block mb-2 text-sm font-medium dark:text-white">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium dark:text-white">Password Baru</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password Baru" required 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" minlength="6">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    Reset
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(role) {
        const modal = document.getElementById('resetPasswordModal');
        const title = document.getElementById('modalTitle');
        const form = document.getElementById('resetPasswordForm');
        const roleInput = document.getElementById('role');

        // Set role dan judul modal
        roleInput.value = role;
        title.textContent = `Reset Password ${role.charAt(0).toUpperCase() + role.slice(1)}`;

        // Tampilkan modal
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('resetPasswordModal');
        modal.classList.add('hidden');
    }
</script>
@endsection