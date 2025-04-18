@extends('admin.layout')

@section('content')
<div class="p-4 dark:text-white">
    <h2 class="text-xl font-semibold mb-4">Manajemen Admin</h2>

    <!-- Notifikasi Sukses -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Reset Password -->
    <div class="mb-4 flex space-x-4">
        <button onclick="openModal('admin')" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Reset Password Admin
        </button>
        <button onclick="openModal('user')" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Reset Password User
        </button>
        <button onclick="openModal('teller')" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">
            Reset Password Teller
        </button>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2">Username</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr class="border-b dark:border-gray-600">
                    <td class="px-4 py-2">{{ $admin->username }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.admins.edit', $admin->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Box -->
<div id="resetPasswordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-96">
        <h2 id="modalTitle" class="text-lg font-semibold mb-4 dark:text-white">Reset Password</h2>
        <form id="resetPasswordForm" action="" method="POST">
            @csrf
            <input type="hidden" id="role" name="role">
            <div class="mb-4">
                <label for="username" class="block mb-1 dark:text-white">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required class="w-full p-2 rounded border">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1 dark:text-white">Password Baru</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password Baru" required class="w-full p-2 rounded border" minlength="6">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
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

        // Set form action dynamically
        if (role === 'admin') {
            form.action = "{{ route('admin.admins.reset-password') }}";
        } else if (role === 'user') {
            form.action = "{{ route('admin.admins.reset-password') }}"; // Replace with user reset route if needed
        } else if (role === 'teller') {
            form.action = "{{ route('admin.admins.reset-password') }}"; // Replace with teller reset route if needed
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('resetPasswordModal');
        modal.classList.add('hidden');
    }
</script>
@endsection