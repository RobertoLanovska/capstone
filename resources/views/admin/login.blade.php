<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-sky-100 via-white to-pink-100">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

    <!-- Header -->
    <div class="text-center mb-6">
      <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-sky-100 text-sky-600 text-2xl">
        <img 
          src="{{ asset('image/logo.png') }}" 
          alt="Logo"
          class="h-10 w-10 object-contain"
        />
      </div>
      <h1 class="text-2xl font-bold text-gray-800">Selamat Datang</h1>
      <p class="text-sm text-gray-500">Silakan login untuk melanjutkan</p>
    </div>

    <!-- STATUS -->
    @if(session('status'))
      <div class="mb-4 rounded-lg bg-green-100 px-4 py-2 text-sm text-green-700">
        {{ session('status') }}
      </div>
    @endif

    <!-- LOGIN ERROR -->
    @error('loginError')
      <div class="mb-4 rounded-lg bg-red-100 px-4 py-2 text-sm text-red-700">
        {{ $message }}
      </div>
    @enderror

    <!-- FORM -->
    <form action="/login" method="POST" class="space-y-4">
      @csrf

      <!-- Email -->
      <div>
        <label class="block text-sm text-gray-600 mb-1">Email</label>
        <input
          type="text"
          name="email"
          value="{{ old('email') }}"
          placeholder="email@contoh.com"
          class="w-full rounded-xl border px-4 py-3 text-sm
                 @error('email') border-red-500 @else border-gray-200 @enderror
                 focus:outline-none focus:ring-2 focus:ring-sky-200"
        >
        @error('email')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div>
        <label class="block text-sm text-gray-600 mb-1">Password</label>
        <input
          type="password"
          name="password"
          placeholder="••••••••"
          class="w-full rounded-xl border px-4 py-3 text-sm
                 @error('password') border-red-500 @else border-gray-200 @enderror
                 focus:outline-none focus:ring-2 focus:ring-sky-200"
        >
        @error('password')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- Button -->
      <button
        type="submit"
        class="w-full rounded-xl bg-sky-600 py-3 text-white font-semibold hover:bg-sky-700 transition"
      >
        Login
      </button>

      <!-- Link -->
      <div class="text-center">
        <a href="#" class="text-sm text-gray-500 hover:text-sky-600">
          Ubah Password
        </a>
      </div>

    </form>
  </div>

</body>
</html>
