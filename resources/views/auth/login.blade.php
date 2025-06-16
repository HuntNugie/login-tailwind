@extends("layouts.app")

@section("auth")
<div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Login to Your Account</h2>

    <form action="{{ route("login.post") }}" method="POST" class="space-y-5">
        @csrf
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" placeholder="you@example.com" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" placeholder="Enter your password" />
      </div>

      <div class="flex items-center justify-between">
        <label class="flex items-center space-x-2 text-sm">
          <input type="checkbox" class="form-checkbox text-blue-500" />
          <span>Remember me</span>
        </label>
        <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
        Login
      </button>
    </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Don't have an account?
      <a href="{{ route("vermel") }}" class="text-blue-600 hover:underline">Sign up</a>
    </p>
  </div>
@endsection
