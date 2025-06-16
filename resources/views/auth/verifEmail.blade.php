@extends("layouts.app")

@section("auth")
<div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Verifikasi Email anda</h2>

    <form action="" method="POST" class="space-y-5">
        @csrf
        <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Masukkan Nama Lengkap : </label>
        <input type="text" name="name" id="name" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Your name"/>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Masukkan Email anda : </label>
        <input type="email" name="email" id="email" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" placeholder="you@example.com" />
      </div>


      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
        Submit
      </button>
    </form>


  </div>
@endsection
