@extends("layouts.app")

@section("auth")
<div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Kode OTP</h2>

    <form action="{{ route("vermel.cekOtp",$id) }}" method="POST" class="space-y-5">
        @csrf
      <div>
        <label for="otp" class="block text-sm font-medium text-gray-700 mb-1">Masukkan Kode Otp Yang telah di kirimkan ke email anda : </label>
        <input type="number" name="otp" id="otp" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" placeholder="532xxx" />
      </div>


      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
        Submit
      </button>
    </form>


  </div>
@endsection
