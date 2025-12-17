<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form action="{{ route('password.update') }}" method="POST" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        @csrf
        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password Baru</label>
            <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
            Ubah Password
        </button>
        <a href="{{ route('login') }}" class="text-blue-500">kembali ke halaman login</a>

        
    </form>
</body>
</html>
